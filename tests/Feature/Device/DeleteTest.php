<?php

namespace Harrometer\TraccarLaravelApi\Tests\Feature\Device;

use Exception;
use Harrometer\TraccarLaravelApi\Exceptions\TraccarApiCallException;
use Harrometer\TraccarLaravelApi\Models\Device;
use Harrometer\TraccarLaravelApi\Tests\BaseTestCase;

class DeleteTest extends BaseTestCase
{
    /**
     * @dataProvider getDevicesIds
     * @throws Exception
     */
    public function testDelete(string $deviceId): void
    {
        $device = Device::find($deviceId);
        $device->delete();

        self::assertNull(Device::find($deviceId));
    }

    public function getDevicesIds(): array
    {
        return [
            ['607024'],
        ];
    }
}
