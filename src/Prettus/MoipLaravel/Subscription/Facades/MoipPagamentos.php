<?php namespace Prettus\MoipLaravel\Subscription\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class MoipPagamentos
 * @package Prettus\MoipLaravel\Subscription\Facades
 */
class MoipPagamentos extends Facade {

    protected static function getFacadeAccessor() { return 'moip-payments'; }

}