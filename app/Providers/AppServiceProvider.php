<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('key', 'value');

        Validator::extend('toggle', function ($attribute, $value, $parameteres, $validator) {
            if (!is_array($value)) {
                return false;
            }
            foreach ($value as $value) {
                if (!in_array($value, ['on', 'off', 1, 0, '1', '0'])) {
                    return false;
                }
            }
            return true;
        });

        Validator::replacer('toggle', function ($message, $attribute, $rule, $parameters) {
            return "The $attribute is invalid";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
