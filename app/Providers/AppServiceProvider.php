<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use League\Flysystem\Config;
use App\Content;
use App\Menu;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        ## top Menu
        $topmenu = Menu::select('title','alias','parent_id','id','url','img')
                        ->where([['menutype','=','header'],['status','=',1],['parent_id','=',0]])
                        ->orderBy('ordering','ASC')->get();
        ## footer1 Menu

        $footer1_menu = Menu::select('title','alias','parent_id','url','img')
        ->where([['menutype','=','footer1'],['status','=',1]])
        ->orderBy('ordering','ASC')->get();

        ## footer2 Menu

        $footer2_menu = Menu::select('title','alias','parent_id','url','img')
        ->where([['menutype','=','footer2'],['status','=',1]])
        ->orderBy('ordering','ASC')->get();
 

        view()->share(compact('topmenu','footer1_menu','footer2_menu'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
