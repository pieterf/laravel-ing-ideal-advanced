<?php

namespace Pieterf\LaravelIngIdealAdvanced\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Pieterf\LaravelIngIdealAdvanced\LaravelIngIdealAdvanced
 */
class LaravelIngIdealAdvanced extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-ing-ideal-advanced';
    }
}
