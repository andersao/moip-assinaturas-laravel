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
            return $this->app('moip-api')->plans();
        });

        $this->app->bind('moip-subscriptions', function(){
            return $this->app('moip-api')->subscriptions();
        });

        $this->app->bind('moip-customers', function(){
            return $this->app('moip-api')->customers();
        });

        $this->app->bind('moip-invoices', function(){
            return $this->app('moip-api')->invoices();
        });

        $this->app->bind('moip-preferences', function(){
            return $this->app('moip-api')->preferences();
        });

        $this->app->bind('moip-payments', function(){
            return $this->app('moip-api')->payments();
        });

        $this->app->alias('MoipPlanos'          , __NAMESPACE__.'Facades\\MoipPlanos');
        $this->app->alias('MoipClientes'        , __NAMESPACE__.'Facades\\MoipClientes');
        $this->app->alias('MoipFaturas'         , __NAMESPACE__.'Facades\\MoipFaturas');
        $this->app->alias('MoipPagamentos'      , __NAMESPACE__.'Facades\\MoipPagamentos');
        $this->app->alias('MoipPreferencias'    , __NAMESPACE__.'Facades\\MoipPreferencias');
        $this->app->alias('MoipAssinaturas'     , __NAMESPACE__.'Facades\\MoipAssinaturas');

        $this->publishes([
            __DIR__.'/../../config/moip-assinaturas.php' => config_path('moip-assinaturas.php'),
        ]);
    }
}