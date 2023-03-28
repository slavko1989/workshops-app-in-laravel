<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Art;
use App\Models\LikeDislike;
use DB;

class HomeController extends Controller
{
    public function index(){
        $arts = Art::paginate(3); 
       $like = DB::table('art')->select('title','images','begin_at')->limit('3')->get();
        return view('/home',compact('arts','like'));
    }
}
