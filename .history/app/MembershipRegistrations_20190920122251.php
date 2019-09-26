<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MembershipRegistrations extends Model
{
   protected $table = 'membership_registrations';
    
    protected $fillable = ['membership_id','classification','typeof_lab','typeof_category','other_certification','organization_name','other_orgname','operational_bed',
    'address','city','state','pincode','pan_no','gst_no','tel_no',
    'website','ceo_name','ceo_mobile','ceo_email','nominated_person','designation','role','person_mobileno','person_email','qualification',
    'org_type','areaof_interest','domain','membership_type','amount','payment_mode','RegistrationNO','MembershipValidity','MembershipValidity','MembershipStatus','OrderId','OrderStatus','Transactionid','StatusMessage','status','created_at','updated_at']; 

}
