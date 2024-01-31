<?php

namespace KFoobar\Support\Facades;

use Illuminate\Support\Facades\Facade;
use KFoobar\Support\ObjectHelper;

class Obj extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return ObjectHelper::class;
    }
}
