<?php

namespace KFoobar\Support;

class Obj
{
    public function make(mixed $data)
    {
        if ($this->isArray($data)) {
            $data = json_decode(json_encode($data), false);
        } elseif ($this->isJsonString($data)) {
            $data = json_decode($data, false);
        } elseif ($this->isStdClass($data)) {
            $data = json_decode(json_encode($data), true);
        }

        return $data;
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
