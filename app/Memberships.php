<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class memberships extends Model
{
   protected $table = 'memberships';
    
    protected $fillable = ['name','short_desc','description','img']; 

}
