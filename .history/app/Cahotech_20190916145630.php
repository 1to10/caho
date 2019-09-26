<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cahotech extends Model
{
    protected $table = 'cahotech';
    protected $fillable = ['title','first_name','last_name','age','organization','designation','address','city','country','state','pincode','mobile','email','fee_category','fee_details',
    'workshop','amount','order_id','order_status','status_message','tracking_id','reference_id','regorderno'];
}
