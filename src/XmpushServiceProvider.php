<?php namespace Stevenyangecho\UEditor;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

/**
 * 参考编辑器
 */
class XmpushServiceProvider extends RouteServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        parent::register();
        $configPath = realpath(__DIR__ . '/../config/Xmpush.php');
        $this->mergeConfigFrom($configPath, 'Xmpush');
        $this->publishes([$configPath => config_path('Xmpush.php')], 'config');
    }

}
