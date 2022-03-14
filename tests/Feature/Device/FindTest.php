<?php

namespace Harrometer\TraccarLaravelApi\Tests\Feature;

use Harrometer\TraccarLaravelApi\Exceptions\TraccarApiCallException;
use Harrometer\TraccarLaravelApi\Models\Device;
use Harrometer\TraccarLaravelApi\Tests\BaseTestCase;
use Exception;

class FindTest extends BaseTestCase
{
    /**
     * @dataProvider getDevicesIds
     */
    public function testFind(string $deviceId, bool $expectsNull): void
    {
        $device = Device::find($deviceId);

        if ($expectsNull) {
            self::assertNull($device);
        } else {
            self::assertNotNull($device->getName());
            self::assertNotEmpty($device->getName());
        }
    }

    public function getDevicesIds(): array
    {
        return [
            ['607024', false],
            ['659855', true],
        ];
    }
}
