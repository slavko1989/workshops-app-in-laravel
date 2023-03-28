<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Art;
use DB;
use App\Models\Comment;
class AdminController extends Controller
{
public function home(){
$count = db::table('users')->count();
$count_comm = db::table('comments')->count();
$user = user::all();
$count_art = db::table('art')->count();
return view('admin.home',compact('user','count','count_art','count_comm'));
}
public function redirect(){
$arts = Art::paginate(3);
if(Auth::id()){
if(Auth::user()->type=='0'){
return view('/home',compact('arts'));
}else{
$count = db::table('users')->count();
$count_comm = db::table('comments')->count();
$user = user::all();
$count_art = db::table('art')->count();
return view('admin.home',compact('arts','count','count_art','count_comm'));
}
}
}
public function workshops(){
$count_comm = db::table('comments')->count();
$art = art::all();
$count = db::table('users')->count();
$count_art = db::table('art')->count();
return view('admin/workshops',compact('art','count','count_art','count_comm'));
}

public function edit($id){
$users = User::find($id);
return view('admin.edit_user',compact('users'));
}
public function update(Request $request,$id){
$edit_user = User::find($id);
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
$edit_user->status = $request->input('status');

$edit_user->update();
return redirect()->back()->with('message','User updated successfully');
}

public function show_comm(){
	
 $users = Comment::join('users', 'users.id', '=', 'comments.user_id')
->join('art', 'art.id', '=', 'comments.art_id')
->select('art.title',

'users.email',
'art.images',
'users.phone',
'users.name',
'comments.comm',
'comments.created_at',
'comments.id',
'users.photo'
)->get();

return view('admin.comm',compact('users'));
}

public function delete_comm($id){
$delete = Comment::where('id',$id)->firstOrFail()->delete();
return redirect()->back()->with('message','Deleted successfully');
}
}