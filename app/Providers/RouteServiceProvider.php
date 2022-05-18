<?php

namespace App\Providers;

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
    protected $Api_namespace = 'App\Http\Controllers\Api';
    protected $Admin_namespace = 'App\Http\Controllers\Admin';
    protected $Site_namespace = 'App\Http\Controllers\Site';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapauthApiRoutes();

        $this->mapguestApiRoutes();

        $this->mapWebRoutes();

        $this->mapAdminRoutes();

        $this->mapSiteRoutes();
    }

    protected function mapauthApiRoutes()
    {
        Route::middleware(['api', 'auth:api', 'lang', 'InitRequest'])
            ->prefix('api')
            ->namespace($this->Api_namespace)
            ->group(base_path('routes/auth-api.php'));
    }

    protected function mapguestApiRoutes()
    {
        Route::middleware(['lang', 'InitRequest'])
            ->prefix('api')
            ->namespace($this->Api_namespace)
            ->group(base_path('routes/guest-api.php'));
    }



    protected function mapAdminRoutes()
    {
        Route::middleware(['web', 'admin', 'lang'])
            ->prefix('admin')
            ->namespace($this->Admin_namespace)
            ->group(base_path('routes/admin.php'));
    }

    protected function mapSiteRoutes()
    {
        Route::middleware(["web", 'site', 'lang'])
            ->namespace($this->Site_namespace)
            ->group(base_path('routes/site.php'));
    }


    protected function mapWebRoutes()
    {
        Route::middleware(["web", 'lang'])
            ->namespace("App\Http\Controllers")
            ->group(base_path('routes/web.php'));
    }
}
