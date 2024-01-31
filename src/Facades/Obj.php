<?php

namespace KFoobar\Object\Facades;

use Illuminate\Support\Facades\Facade;

class Obj extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \KFoobar\Support\Obj::class;
    }
}
