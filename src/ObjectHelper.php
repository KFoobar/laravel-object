<?php

namespace KFoobar\Support;

use Exception;

class ObjectHelper
{
    public function make(mixed $data)
    {
        if ($this->isArray($data)) {
            $object = json_decode(json_encode($data), false);
        } elseif ($this->isJsonString($data)) {
            $object = json_decode($data, false);
        } elseif ($this->isStdClass($data)) {
            $array = json_decode(json_encode($data), true);
            $object = json_decode(json_encode($array), false);
        }

        if (empty($object) || !$object instanceof \stdClass) {
            throw new Exception('Failed to convert to object!');
        }

        return $object;
    }

    private function isArray($data): bool
    {
        return is_array($data);
    }

    private function isJsonString($data): bool
    {
        return is_string($data)
            && is_array(json_decode($data, true))
            && (json_last_error() == JSON_ERROR_NONE)
            ? true
            : false;
    }

    private function isStdClass($data): bool
    {
        return ($data instanceof \stdClass)
            ? true
            : false;
    }
}
