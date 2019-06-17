<?php

namespace Shenstef\QQLbs;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(Region::class, function(){
            return new Region(config('services.qqlbs.key'));
        });

        $this->app->singleton(Ip2City::class, function(){
            return new Ip2City(config('services.qqlbs.key'));
        });

        $this->app->alias(Region::class, 'region');
        $this->app->alias(Ip2City::class, 'ip2city');
    }

//    public function provides()
//    {
//        return [Region::class, 'region'];
//    }
}
