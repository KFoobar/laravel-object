<?php

namespace KFoobar\Support;

class Obj
{
    public static function make($data)
    {
        if (self::isArray($data)) {
            $data = json_decode(json_encode($data), false);
        } elseif (self::isJsonString($data)) {
            $data = json_decode($data, false);
        } elseif (self::isStdClass($data)) {
            $data = json_decode(json_encode($data), true);
        }

        return $data;
    }

    private static function isArray($data)
    {
        return is_array($data);
    }

    private static function isJsonString($data)
    {
        return is_string($data)
            && is_array(json_decode($data, true))
            && (json_last_error() == JSON_ERROR_NONE)
                ? true
                : false;
    }

    private static function isStdClass($data)
    {
        return ($data instanceof \stdClass)
            ? true
            : false;
    }
}
