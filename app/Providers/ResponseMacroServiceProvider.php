<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseMacroServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Response::macro('apiResp', function ($value) {
            return response($value, 200)->withHeaders([
                'Content-Type' => 'application/json',
                'Redirector' => 'Activator.jo'
            ]);
        });
    }
}
