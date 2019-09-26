<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cahocon extends Model
{
    protected $table = 'cahocon';
    protected $fillable = ['title','first_name','last_name','age','organization','designation','address','city','country','state','pincode','mobile','email','fee_category','fee_details'];
}
