<?php
namespace App\Http\Controllers;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Comment;
use App\Models\LikeDislike;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\SignUp;
use DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller 
{

public function users(){
$count = db::table('users')->count();
$count_comm = db::table('comments')->count();
$user = user::all();
$count_art = db::table('art')->count();
return view('admin.users',compact('user','count','count_art','count_comm'));
}
public function perform(Request $request)
{
auth()->logout();
$request->session()->invalidate();
$request->session()->regenerateToken();
return redirect('/')->with('message','You are logout');
}
public function show_panel(){
$user_id = Auth::user()?->id;
$comm = Comment::join('users', 'users.id', '=', 'comments.user_id')
->join('art', 'art.id', '=', 'comments.art_id')
->select('art.title',
'art.id',
'users.name',
'comments.comm',
'comments.created_at',
'comments.id',
'users.photo'
)->where('comments.user_id','=',$user_id)->get();

$like = LikeDislike::join('users', 'users.id', '=', 'like_dislikes.user_id')
->join('art', 'art.id', '=', 'like_dislikes.art_id')
->select('art.title'
)->where('like_dislikes.user_id','=',$user_id)->get();

 $show = SignUp::join('users', 'users.id', '=', 'sign_ups.user_id')
            ->join('art', 'art.id', '=', 'sign_ups.art_id')
            ->select('art.title',
            'art.id',
            'sign_ups.id',
            'art.address',
            'users.name',
            'art.begin_at',
            'art.city',
    
            'sign_ups.confirm'
            )->where('sign_ups.user_id','=',$user_id)->get();
return view('users.user_panel',compact('comm','like','show'));
}
public function delete($id){
$delete = Comment::where('id',$id)->firstOrFail()->delete();
return redirect()->back()->with('message','Deleted successfully');
}
public function store(Request $request){
$formValid = $request->validate([
'name'=>['required','min:3'],
'email'=>['required',Rule::unique('users','email')],
'password'=>'required|min:6',
'password_confirmation'=>'required|same:password',
'phone'=>'required',
'username'=>'required',
'photo'=>'required|mimes:jpg,png,gif,jpeg,svg'
]);
$image = $request->photo;
if($image){
$imgname = time().'.'.$image->getClientOriginalExtension();
$request->photo->move('users_img',$imgname);
$formValid['photo']=$imgname;
}
$formValid['password'] = bcrypt($formValid['password']);
$user = User::create($formValid);
/*$user->sendEmailVerificationNotification();
return $user;*/
auth()->login($user);
return redirect()->back()->with('message','User created, now you can login');
}

public function edit($id){
	$user = User::find(Auth::user()->id);
	return view('users.edit_user',compact('user'));
}

public function update(Request $request,$id){

	 $edit_user = User::find(Auth::user()->id);

        $image = $request->photo;
        if($image){
        $imgname = time().'.'.$image->getClientOriginalExtension();
        $request->photo->move('users_img',$imgname);
        $edit_user->photo=$imgname;
        }

        $edit_user->name = $request->input('name');
        $edit_user->email = $request->input('email');
        $edit_user->username = $request->input('username');
        $edit_user->phone = $request->input('phone');
        
        $edit_user->update();
        return redirect()->back()->with('message','User updated successfully'); 

}
public function change_pass(Request $request){
    $this->validate($request,[

        'password'=>'required',
        'new_password'=>'required|min:8'
    ]);
    $auth = Auth::user();
    if(!Hash::check($request->get('password'),$auth->password)){
        return redirect()->back()->with('message','Curent password is invalid');
    }
    if (strcmp($request->get('password'), $request->new_password) == 0) 
        {
            return redirect()->back()->with("message", "New Password cannot be same as your current password.");
        }
        $user =  User::find($auth->id);
        if($user){
        $user->password =  Hash::make($request->new_password);
        $user->save();
        auth()->logout();
$request->session()->invalidate();
$request->session()->regenerateToken();
        return redirect('/')->with('message', "Password Changed Successfully");
    }else{

    }
}

public function show_change_pass(){
    return view('users.change_pass');
}
}