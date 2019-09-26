<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{

    protected $fillable = [
        'title','subtitle','Banner_text','alias', 'introtext','article_description','article_description_bottom','status','catid','ordering','img','banner_img','im_thumb','metatitle','metadescription','metakeyword','content_type','created_at',
        'updated_at','service_status','publishdate','publishtime','popup_status','external_url'];

    public function category()
    {
        return $this->belongsTo('App\Category', 'catid','id');
    }


}
