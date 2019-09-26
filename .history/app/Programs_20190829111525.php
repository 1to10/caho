<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programs extends Model
{
   protected $table = 'programs';
    
    protected $fillable = ['title','ordering','status','created_at','updated_at']; 

}
