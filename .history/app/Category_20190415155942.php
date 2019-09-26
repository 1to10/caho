<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $table = 'categories';
    
    protected $fillable = ['title','cat_slug','cat_desc','ordering','cat_type','banner_img','iconimg','iconimg_hover','Banner_text','cat_metatitle','cat_metadesc','cat_metakeywords',
        'parent_id','ordering','status','created_at','updated_at'];


    public function parent()
    {
        return $this->belongsTo('App\Category', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }

    public function childs() {

        return $this->hasMany('App\Category','parent_id','id')->where('status','=','1')->orderBy('ordering','ASC') ;
    }

    public function CategoryPName($parent_id)
    {
        //dd($id);
        $cname=Category::where('id','=',$parent_id)->first();

        return $cname;
    }

    

}
