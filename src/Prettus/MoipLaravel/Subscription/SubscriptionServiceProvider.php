<?php namespace Prettus\MoipLaravel\Subscription;

use Illuminate\Support\ServiceProvider;
use Prettus\Moip\Subscription\Api;
use Prettus\Moip\Subscription\MoipClient;

/**
 * Class SubscriptionServiceProvider
 * @package Prettus\MoipLaravel\Subscription
 */
class SubscriptionServiceProvider extends ServiceProvider {

    /**
     *
     */
    public function register()
    {
    }

    /**
     *
     */
    public function boot()
    {
        $this->app->singleton('moip-client', function(){
            return new MoipClient(
                config('moip-assinaturas.api_token'),
                config('moip-assinaturas.api_key'),
                config('moip-assinaturas.environment','api')
            );
        });

        $this->app->singleton('moip-api', function(){
            return new Api( $this->app('moip-client') );
        });

        $this->app->bind('moip-plans', function(){
            return app('moip-api')->plans();
        });

        $this->app->bind('moip-subscriptions', function(){
            return app('moip-api')->subscriptions();
        });

        $this->app->bind('moip-customers', function(){
            return app('moip-api')->customers();
        });

        $this->app->bind('moip-invoices', function(){
            return app('moip-api')->invoices();
        });

        $this->app->bind('moip-preferences', function(){
            return app('moip-api')->preferences();
        });

        $this->app->bind('moip-payments', function(){
            return app('moip-api')->payments();
        });

        $this->publishes([
            __DIR__.'/../../../config/moip-assinaturas.php' => config_path('moip-assinaturas.php'),
        ]);
    }
}