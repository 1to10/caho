<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programs extends Model
{
   protected $table = 'programs';
    
    protected $fillable = ['title','cat_id','location','programdate','ordering','status','created_at','updated_at']; 

}
