<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use DB;
use App\Models\Art;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\CommRequest;

class CommentControllers extends Controller
{
    public function store(CommRequest $request, $id){

        $request->validated();
        if(auth::user){
        $id = auth::user()->id;
        $art = art::find($id);
        $comm = new comment;

        $comm->user_id = $id;
        $comm->art_id = $art->id;
        $comm->comm = $request->comm;

        $comm->save;
        return redirect()->back()->with('message','Comments are created');

    }else{
        return redirect()->back()->with('message','You are not logged in')
         }
    }
    public function create($id){
        $art = Art::find($id);
        return view('arts.arts_single_details',compact('art'));
    }
}
