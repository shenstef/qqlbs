<?php

namespace Shenstef\QQLbs;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(Region::class, function(){
            return new Region();
        });

        $this->app->singleton(Ip2City::class, function(){
            return new Ip2City();
        });

        $this->app->alias(Region::class, 'region');
        $this->app->alias(Ip2City::class, 'ip2city');
    }

//    public function provides()
//    {
//        return [Region::class, 'region'];
//    }
}
