<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\ArtRequest;
use App\Http\Requests\CommRequest;
use App\Models\Art;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\LikeDislike;
use App\Models\SignUp;

use DB;
class ArtShopsController extends Controller
{
public function show(){
$user_id = Auth::user()->id;
$art = Art::join('users', 'users.id', '=', 'art.user_id')
->select('art.title',
'art.id',
'art.created_at',
'art.text',
'art.images',
'art.address',
'art.number',
'art.mat_number',
'art.seats',
'art.begin_at',
'art.city',
'art.country',
'art.number',
)->where('art.user_id','=',$user_id)->get();
return view('arts.arts_show',compact('art'));
}
public function create(){
return view('arts.arts_create');
}
public function store(ArtRequest $request){
$request->validated();
if(Auth::user()){
$user = Auth::user();
$art = new Art;
$art->user_id = $user->id;
$art->address = $request->address;
$art->number = $request->number;
$art->mat_number = $request->mat_number;
$art->city = $request->city;
$art->country = $request->country;
$art->title = $request->title;
$art->text = $request->text;
$art->begin_at = $request->begin_at;
$art->seats = $request->seats;
$image = $request->images;
if($image){
$imgname = time().'.'.$image->getClientOriginalExtension();
$request->images->move('arts_shops',$imgname);
$art->images=$imgname;
}
$art->save();
return redirect()->back()->with('message','Art workshop are created');
}else{
return redirect()->back()->with('message','You are not logged in');
}
}
public function show_single_workshop($id){

$count_like = LikeDislike::where('art_id', $id)->having('like', '>', 0)->get()->count();
;	
$count_dislike = LikeDislike::where('art_id', $id)->having('dislike', '<', 0)->get()->count();
$like = LikeDislike::all();
$art = Art::find($id);
$user = Auth::user(); 
$u = $user ? $user->id : 1;
 $show = SignUp::join('users', 'users.id', '=', 'sign_ups.user_id')
            ->join('art', 'art.id', '=', 'sign_ups.art_id')
            ->select('art.title',
            'art.id',
            'sign_ups.id',
            'art.address',
        	'sign_ups.user_id',
            'art.begin_at',
            'art.city',
            'users.name',
            'users.photo',
            'sign_ups.confirm'
            )->where('sign_ups.user_id','=',$u)->get();

return view('arts.arts_single_details',compact('art','count_like','count_dislike','like','show'));

}
public function edit($id){
$art = Art::find($id);
return view('arts.art_edit',compact('art'));
}
public function update(ArtRequest $request, $id){
$request->validated();

$art = Art::find($id);
$image = $request->images;
if($image){
$imgname = time().'.'.$image->getClientOriginalExtension();
$request->images->move('arts_shops',$imgname);
$art->images=$imgname;
$art->id = $request->id;
$art->address = $request->address;
$art->number = $request->number;
$art->mat_number = $request->mat_number;
$art->city = $request->city;
$art->country = $request->country;
$art->title = $request->title;
$art->text = $request->text;
$art->begin_at = $request->begin_at;
$art->seats = $request->seats;
$art->update();
return redirect()->back()->with('message','Product updated successfully');
}
}
public function delete($id){
$delete = Art::where('id',$id)->firstOrFail()->delete();
return redirect()->back()->with('message','Deleted successfully');
}
public function store_comm(CommRequest $request, $id){
$request->validated();
if(auth::check()){
$art = Art::where('id','=',$id)->first();
if($art){
$comm = new comment;
$comm->user_id = Auth::user()->id;
$comm->art_id = $art->id;
$comm->comm = $request->comm;
$comm->save();

}else{
	return redirect()->back()->with('message','Nothing to show');
}
return redirect()->back()->with('message','Comments are created');
}else{
return redirect()->back()->with('message','You are not logged in');
}
}

    
public function edit_comm($id){
$comm = Comment::find($id);
return view('arts.arts_edit_comm',compact('comm'));
}
public function update_comm(CommRequest $request, $id){
$request->validated();
$comm = Comment::find($id);

$comm->id = $request->id;
$comm->comm = $request->comm;
$comm->update();
return redirect()->back()->with('message','Product updated successfully');
}

public function like(Request $request,$id){

if(auth::check()){
$art = Art::where('id','=',$id)->first();
if($art){
$like = new LikeDislike;
	$like->art_id = $art->id;
	$like->user_id = Auth::user()->id;
	if($like->like = $request->like=1){

	}else{
	$like->dislike = $request->dislike=2;
}
	$like->save();


}else{
	return redirect()->back()->with('message','Nothing to show');
}
return redirect()->back()->with('mess','You like this workshop');
}else{
return redirect()->back()->with('message','You are not logged in');
}

}

public function dislike($id){
if(auth::check()){
	$like = DB::table('like_dislikes')->where('art_id',$id)->where('user_id',auth::user()->id)->delete();
	return redirect()->back()->with('mess','You dont like this workshop');
}else{
	return redirect()->back()->with('message','You are not logged in');

}

	}

}