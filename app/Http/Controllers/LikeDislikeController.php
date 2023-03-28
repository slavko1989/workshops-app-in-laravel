<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LikeDislike;
use App\Models\Art;
use DB;

class LikeDislikeController extends Controller
{
    public function top_liked($id){
        $art = Art::find($id);
        $like = LikeDislike::join('art', 'art.id', '=', 'like_dislikes.art_id')->select('art.title','art.images')->where('art_id',$art->id,'top 4')
        ->sum('like')->get();

        return view('section.sidebar',compact('like'));
    }
}
