<?php
declare(strict_types=1);

namespace TechShark\LaravelPiggy\Providers;

use Illuminate\Config\Repository;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use TechShark\LaravelPiggy\Managers\PiggyManager;

/**
 * Class PiggyServiceProvider
 *
 * @author Tyler Brennan < info@techshark.nl >
 * @version 1.0
 */
class PiggyServiceProvider extends ServiceProvider
{

    /**
     *
     */
    public function boot()
    {
        $this->publishes(
            [
                __DIR__ . '/../config/piggy.php' => config_path('piggy.php')
            ]
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            PiggyManager::class,
            function (Application $application) {
                $config = $application->make(Repository::class);

                $piggyManager = new PiggyManager();
                $piggyManager
                    ->setVersion(
                        $config->get('piggy.api_version')
                    )
                    ->setApiKey(
                        $config->get('piggy.api_key')
                    )
                    ->setBaseUrl(
                        $config->get('piggy.api_base_url')
                    );

                return $piggyManager;
            }
        );
    }
}
