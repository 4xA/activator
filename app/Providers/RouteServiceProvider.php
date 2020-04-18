<?php

namespace App\Providers;

use App\DeviceType;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        Route::resourceVerbs([
            'create' => 'ishnaa',
        ]);

        // Route::model('type', DeviceType::class);
        Route::bind('type', function ($value) {
            if ($value == "doabarrelroll") {
                abort(500);
            }
            return DeviceType::where('name', $value)->first();
        });

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAdminRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::domain(env('APP_DOMAIN', 'activator.com'))
             ->middleware(['web', 'throttle:rate_limit,1'])
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::domain(env('API_DOMAIN', 'api.activator.com'))
             ->prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    protected function mapAdminRoutes()
    {
        $domain = env('APP_DOMAIN', 'activator.com');
        Route::domain("admin.$domain")
             ->middleware(['web', 'throttle:rate_limit,1'])
             ->namespace($this->namespace)
             ->group(base_path('routes/admin.php'));
    }
}
