<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * 
     * The controller namespace for the application
     * 
     * @var string|null
     */
    protected $namespace = "App\\Http\\Controllers";

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();
    }

    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->mapPanelRoutes();
    }

    /**
     * Define the "web" routes the for application.
     * 
     * These routes all routes receive session state, CSRF protection, etc.
     * 
     * @return void
     */
    protected function mapWebRoutes(): void
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     * 
     * These routes are typically stateless
     * 
     * @return void
     */
    protected function mapApiRoutes(): void
    {
        Route::middleware('api')
            ->namespace($this->namespace)
            ->prefix('api')
            ->group(base_path('routes/api.php'));
    }

    /**
     * Define the "admin panel" routes for the application.
     * 
     * @return void
     */
    protected function mapPanelRoutes(): void
    {
        Route::prefix('panel')
            ->middleware(['web', 'auth', 'is.admin', 'verified'])
            ->namespace("{$this->namespace}\Panel")
            ->group(base_path('routes/panel.php'));
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()->id ?: $request->ip());
        });
    }
}
