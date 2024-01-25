<?php

namespace Hounddd\Data;

use App;
use Config;
use System\Classes\PluginBase;

/**
 * Data Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     */
    public function pluginDetails(): array
    {
        return [
            'name'        => 'hounddd.data::lang.plugin.name',
            'description' => 'hounddd.data::lang.plugin.description',
            'author'      => 'Hounddd',
            'icon'        => 'icon-cubes'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     */
    public function register(): void
    {
        // Register the service providers provided by the packages used by your plugin
        App::register(\Spatie\LaravelData\LaravelDataServiceProvider::class);
    }

    /**
     * Boot method, called right before the request route.
     */
    public function boot(): void
    {
        $this->bootPackages();
    }

    /**
     * Registers any frontend components implemented in this plugin.
     */
    public function registerComponents(): array
    {
        return [];
    }

    /**
     * Registers any backend permissions used by this plugin.
     */
    public function registerPermissions(): array
    {
        return [];
    }

    /**
     * Registers backend navigation items for this plugin.
     */
    public function registerNavigation(): array
    {
        return [];
    }

    /**
     * Loads any packages config used by this plugin
     */
    public function bootPackages(): void
    {
        // Get the namespace code of the current plugin
        $pluginNamespace = str_replace('\\', '.', strtolower(__NAMESPACE__));

        // Locate the packages to boot
        $packages = \Config::get($pluginNamespace . '::packages');

        // Boot each package
        foreach ($packages as $name => $options) {
            // Apply the configuration for the package
            if (
                !empty($options['config']) &&
                !empty($options['config_namespace'])
            ) {
                Config::set($options['config_namespace'], $options['config']);
            }
        }
    }
}
