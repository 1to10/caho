<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registrations extends Model
{
   protected $table = 'registrations';
    
    protected $fillable = ['program_id','uniqueid','title','first_name','last_name','age','type_of_profession',
    'sex','qualification','current_organisation','designation','total_work_exprience','exp_in_quality','mobile',
    'email','city','state','address','applied_for','applied_for_sub_cat','program_location','registration_fee','are_you_currently','is_your_current',
    'do_you_have','cv_to_be','photograph','order_status','status_message','order_id','tracking_id','status','ordering','created_at','updated_at']; 

}
