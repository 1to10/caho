<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscribes extends Model
{
    protected $table = 'subscribes';
    protected $fillable = ['email','status','created_at','updated_at'];
}
