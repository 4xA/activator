<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;
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
        Blade::component('components.image-displayer', 'image');

        // Blade::withoutDoubleEncoding();

        Blade::directive('datetime', function ($expression) {
            return "<?php echo ($expression)->format('d-m-Y g:i A'); ?>";
        });

        Blade::if('env', function ($environment) {
            return app()->environment($environment);
        });

        View::share('hoursLeft', self::hoursLeftTillEndOfDay());

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

    private static function hoursLeftTillEndOfDay ()
    {
        $now = Carbon::now();
        $leaveTime = Carbon::parse('19:00');
        if ($now->gt($leaveTime)) {
            return 0;
        }
        $hoursLeft = ceil($now->diffInMinutes($leaveTime, false) / 60);
        return $hoursLeft;
    }
}
