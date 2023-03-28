<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SignUp;


use App\Models\Art;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB;

class SignUpController extends Controller
{
    public function signup(Request $request,$id){

        if(auth::check()){
        $user = Auth::user();
        $art = Art::where('id','=',$id)->first();
        if($art){
        $signup = new SignUp;
        $signup->user_id = $user->id;
        $signup->art_id = $art->id;
        $signup->save();
    }else{
        return redirect()->back()->with('message','fuck');
    }
        return redirect()->back()->with('message','Your wish is sent to admin, we will sent quick response on email');
        }else{
        return redirect()->back()->with('message','You are not logged in');
        }
    }

      public function cancel($id){
           SignUp::where('id',$id)->firstOrFail()->delete();
            return redirect()->back()->with('message','you have canceled your attendance');
    }   
}


