<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Art;

class LikeDislike extends Model
{

    protected $fillable=['like','dislike','user_id','art_id'];

    public function art(){
        return $this->belongsTo(Art::class,'art_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    use HasFactory;
}
