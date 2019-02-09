<?php

declare(strict_types=1);

/*
 * This file is part of the Eloquent Viewable package.
 *
 * (c) Cyril de Wit <github@cyrildewit.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CyrildeWit\LaravelSilentAuthentication;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use CyrildeWit\LaravelSilentAuthentication\Guards\SessionGuard;

class SilentAuthenticationServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $config = $this->app->config['silent-authentication'];

            $this->publishes([
                __DIR__.'/../config/silent-authentication.php' => $this->app->configPath('silent-authentication.php'),
            ], 'config');
        }
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/silent-authentication.php',
            'silent-authentication'
        );

        if (config('silent-authentication.default_session_guard.enabled')) {
            $this->registerSessionDriver();
        }
    }

    /**
     * Register the custom session driver with silent authentication.
     *
     * @return  void
     */
    protected function registerSessionDriver()
    {
        $auth = $this->app['auth'];

        $providerName = config('silent-authentication.default_session_guard.provider_name');

        $auth->extend($providerName, function (Application $app, $name, array $config) use ($auth) {
            $provider = $auth->createUserProvider($config['provider']);

            $guard = new SessionGuard($name, $provider, $app['session.store']);

            if (method_exists($guard, 'setCookieJar')) {
                $guard->setCookieJar($app['cookie']);
            }

            if (method_exists($guard, 'setDispatcher')) {
                $guard->setDispatcher($app['events']);
            }

            if (method_exists($guard, 'setRequest')) {
                $guard->setRequest($app->refresh('request', $guard, 'setRequest'));
            }

            return $guard;
        });
    }
}
