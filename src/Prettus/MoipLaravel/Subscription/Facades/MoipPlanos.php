<?php namespace Prettus\MoipLaravel\Subscription\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class MoipPlanos
 * @package Prettus\MoipLaravel\Subscription\Facades
 */
class MoipPlanos extends Facade {

    protected static function getFacadeAccessor() { return 'moip-plans'; }

}