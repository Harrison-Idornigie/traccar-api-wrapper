<?php

namespace Harrometer\TraccarLaravelApi\Tests\Feature\Device;

use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Harrometer\TraccarLaravelApi\Models\Device;
use PHPUnit\Framework\TestCase;
use Harrometer\TraccarLaravelApi\Tests\BaseTestCase;


class CreateTest extends BaseTestCase
{

    public function testCreateNew(): void
    {

        $device_attributes = [
            'id' => -1,
            'name' => $this->faker->name,
            'uniqueId' => Str::uuid(),
            "phone" => '',
            "model" => '',
            "contact" => '',
            "category" => null,
            "status" => null,
            "lastUpdate" => null,
            "groupId" => 0,
            "disabled" => false,
        ];

        $deviceModel = Device::store($device_attributes['name']);

        $this->assertSame($device_attributes['name'], $deviceModel->getName());
    }
}
