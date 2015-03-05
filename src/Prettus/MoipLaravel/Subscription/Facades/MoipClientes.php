<?php namespace Prettus\MoipLaravel\Subscription\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class MoipClientes
 * @package Prettus\MoipLaravel\Subscription\Facades
 */
class MoipClientes extends Facade {

    protected static function getFacadeAccessor() { return 'moip-customers'; }

}