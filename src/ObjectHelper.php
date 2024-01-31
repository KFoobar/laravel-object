<?php

namespace KFoobar\Support;

use Exception;

class ObjectHelper
{
    /**
     * Convert input to object.
     *
     * @param  mixed     $data
     * @param  bool      $throw
     *
     * @throws Exception
     *
     * @return mixed
     */
    public function make(mixed $data, bool $throw = false)
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
            if ($throw === true) {
                throw new Exception('Unable to transform the given input into an object.');
            }

            return null;
        }

        return $object;
    }

    /**
     * Determines whether the specified data is array.
     *
     * @param mixed $data
     *
     * @return bool
     */
    private function isArray($data): bool
    {
        return is_array($data);
    }

    /**
     * Determines whether the specified data is json string.
     *
     * @param mixed $data
     *
     * @return bool
     */
    private function isJsonString($data): bool
    {
        return is_string($data)
            && is_array(json_decode($data, true))
            && (json_last_error() == JSON_ERROR_NONE)
            ? true
            : false;
    }

    /**
     * Determines whether the specified data is standard class.
     *
     * @param mixed $data
     *
     * @return bool
     */
    private function isStdClass($data): bool
    {
        return ($data instanceof \stdClass)
            ? true
            : false;
    }
}
