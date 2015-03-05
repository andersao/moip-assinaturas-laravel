<?php namespace Prettus\MoipLaravel\Subscription;

use Illuminate\Support\ServiceProvider;
use Prettus\Moip\Subscription\Api;
use Prettus\Moip\Subscription\MoipClient;

/**
 * Class SubscriptionServiceProvider
 * @package Prettus\MoipLaravel\Subscription
 */
class SubscriptionServiceProviderLaravel4 extends ServiceProvider {

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
        $this->package('prettus/moip-assinaturas-laravel', 'moip-assinaturas', __DIR__.'/../../' );

        $this->app->singleton('moip-client', function(){
            return new MoipClient(
                \Config::get('moip-assinaturas::moip-assinaturas.api_token'),
                \Config::get('moip-assinaturas::moip-assinaturas.api_key'),
                \Config::get('moip-assinaturas::moip-assinaturas.environment','api')
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

        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('MoipPlanos'          , __NAMESPACE__.'Facades\\MoipPlanos');
        $loader->alias('MoipClientes'        , __NAMESPACE__.'Facades\\MoipClientes');
        $loader->alias('MoipFaturas'         , __NAMESPACE__.'Facades\\MoipFaturas');
        $loader->alias('MoipPagamentos'      , __NAMESPACE__.'Facades\\MoipPagamentos');
        $loader->alias('MoipPreferencias'    , __NAMESPACE__.'Facades\\MoipPreferencias');
        $loader->alias('MoipAssinaturas'     , __NAMESPACE__.'Facades\\MoipAssinaturas');
    }
}