<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Cashier::ignoreMigrations();

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        \Blade::directive('domain', function ($expression) {
            return "<?php echo parse_url($expression, PHP_URL_HOST); ?>";
        });

        if ($this->app->environment('local')) {
            URL::forceScheme('http');
        }else{
            URL::forceScheme('https');
        }        

    }
}
