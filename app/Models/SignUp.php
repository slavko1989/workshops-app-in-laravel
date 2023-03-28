<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignUp extends Model
{

    protected $fillable=['user_id,art_id,seats,confirm'];
    use HasFactory;
}
