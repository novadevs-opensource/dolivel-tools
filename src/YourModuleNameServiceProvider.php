<?php
namespace Novadevs\Dolivel\<module-name>;

use Illuminate\Support\ServiceProvider;

use Novadevs\Dolivel\Base\Models\Module;
use Novadevs\Dolivel\Base\Repositories\ModuleInterface;
use Novadevs\Dolivel\Base\Repositories\ModuleRepository;

use \stdClass;

class <module-name>ServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/mod-conf.php', 'dolivel-<module-name>'
        );

        $this->app->bind('ModuleInterface', function($app) {
            return new ModuleRepository( new Module() );
        });

    }

    /**
     * Bootstrap services.
     *
     * @param Request $request
     * @return void
     */
    public function boot()
    {
        // Loading route files.
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        // Loading migrations
        $this->loadMigrationsFrom(__DIR__.'/Database/migrations');

        // Loading views
        $this->loadViewsFrom(__DIR__.'/resources/views', '<module-name>');

        // Loading translations
        $this->loadTranslations();

        // Publishing assets
        $this->publishes([
            __DIR__.'/public' => public_path('vendor/novadevs/Dolivel'),
        ], 'dolivel-<module-name>-assets');

        // Publishing views
        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views'),
        ], 'dolivel-<module-name>-views');

        // Publishing config
        $this->publishes([
            __DIR__ . '/config' => config_path('novadevs/Dolivel/<module-name>')
        ], 'dolivel-<module-name>-config');

        // Publishing commands
        $this->loadCommands();
    }

    /**
     * Load package artisan commands
     *
     * @return void
     */
    public function loadCommands()
    {
        $this->commands('Novadevs\Dolivel\<module-name>\Commands\InstallModule');
    }

    /**
     * Load package translations
     *
     * @return void
     */
    public function loadTranslations()
    {
        $this->loadTranslationsFrom(__DIR__ .'/resources/lang', '<module-name>');

        $this->publishes([
            __DIR__.'/resources/lang' => resource_path('lang'),
        ]);
    }
}
