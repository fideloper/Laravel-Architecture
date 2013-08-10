<?php namespace Arch\Validation;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;
use DateTime;

class ValidationServiceProvider extends ServiceProvider {

    public function register()
    {

    }

    public function boot()
    {
        $this->app['validator']->extend('datetime', function($attribute, $value, $parameters)
        {
            return $value instanceOf DateTime;
        });

        $this->app['validator']->extend('collection', function($attribute, $value, $parameters)
        {
            return $value instanceOf Collection;
        });
    }

}