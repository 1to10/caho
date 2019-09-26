<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Menu extends Model
{
    protected $table = "menus";
    protected $fillable = [
        'menutype',
		'title',
		'alias',
        'status',
        'parent_id',
        'ordering',
        'url',
        'img',
        'created_at',
        'updated_at'
    ];


    public function parent()
    {
        return $this->belongsTo('App\Menu', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Menu', 'parent_id')->where('status','=','1')->orderBy('ordering','ASC');
    }
    public function childs() {

        return $this->hasMany('App\Menu','parent_id','id')->where('status','=','1')->orderBy('ordering','ASC');
    }
}