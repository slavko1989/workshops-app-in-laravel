<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;
use App\Models\LikeDislike;

class Art extends Model
{
    protected $fillable=[
    'address,number,mat_number,city,country,images,user_id,status,title,text,begin_at,seats,confirmation','id'];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class,'created_at','id');
    }

    public function comments(){
        return $this->hasMany(Comment::class,'art_id','id');
    }

    public function like(){
        return $this->hasMany(LikeDislike::class,'art_id','id');
    }
}
