<?php namespace Prettus\MoipLaravel\Subscription\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class MoipFaturas
 * @package Prettus\MoipLaravel\Subscription\Facades
 */
class MoipFaturas extends Facade {

    protected static function getFacadeAccessor() { return 'moip-invoices'; }

}