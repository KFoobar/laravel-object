<?php

namespace KFoobar\Support\Test\Unit;

use Exception;
use Illuminate\Support\Facades\Config;
use KFoobar\Support\Facades\Obj;
use KFoobar\Support\Test\Unit\TestCase;
use stdClass;

class ObjClassTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testConvertFromArray(): void
    {
        $input = [
            'foo' => 'bar',
            'bar' => [
                'foo' => 'bar',
                'bar' => 'foo',
            ],
        ];

        $object = Obj::make($input);

        $this->assertIsObject($object);
    }

    public function testConvertFromJson(): void
    {
        $input = [
            'foo' => 'bar',
            'bar' => [
                'foo' => 'bar',
                'bar' => 'foo',
            ],
        ];

        $object = Obj::make(json_encode($input));

        $this->assertIsObject($object);
    }

    public function testConvertFromObject(): void
    {
        $input = new stdClass;
        $input->foo = 'bar';
        $input->bar = [
            'foo' => 'bar',
        ];

        $object = Obj::make($input);

        $this->assertIsObject($object);
    }

    public function testConvertFromString(): void
    {
        $object = Obj::make('lorem ipsum');

        $this->assertNull($object);
    }

    public function testConvertFromStringWithException(): void
    {
        $this->expectException(Exception::class);

        $object = Obj::make('lorem ipsum', true);
    }
}
