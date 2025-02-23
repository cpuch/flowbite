<?php

namespace Cpuch\Flowbite;

use Illuminate\Support\Facades\Blade;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap the package services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/flowbite'),
            ], 'cpuch-flowbite-views');

            $this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/flowbite'),
            ], 'cpuch-flowbite-assets');
        }

        $this->registerViews();
        $this->registerBladeComponents();
        $this->registerBladeDirectives();
    }

    /**
     * Register the package services.
     */
    public function register()
    {
        $this->app->bind('flowbite', function () {
            return new Flowbite;
        });
    }

    /**
     * Register the package views.
     */
    public function registerViews()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'flowbite');
    }

    /**
     * Register the package Blade components.
     */
    public function registerBladeComponents()
    {
        Blade::componentNamespace('Cpuch\Flowbite\View\Components', 'flowbite');
    }

    /**
     * Register the package Blade directives.
     */
    public function registerBladeDirectives()
    {
        Blade::directive('flowbiteStyle', function ($expression) {
            return "<?php echo '<link href=\"https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css\" rel=\"stylesheet\" />'; ?>";
        });

        Blade::directive('flowbiteScript', function ($expression) {
            return "<?php echo '<script src=\"https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js\"></script>'; ?>";
        });

        Blade::directive('flowbiteComponentsStyle', function ($expression) {
            return "<?php echo '<link href=' . asset('vendor/flowbite/components.css') . ' rel=\"stylesheet\" />'; ?>";
        });
    }
}
