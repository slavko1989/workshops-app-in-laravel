<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Art;
use App\Models\User;

class Comment extends Model
{
    protected $fillable=["user_id,art_id,comm,id"];
    use HasFactory;

    public function art(){
        return $this->belongsTo(Art::class,'art_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
