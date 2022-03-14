<?php

namespace Harrometer\TraccarLaravelApi\Tests\Feature\Device;

use Harrometer\TraccarLaravelApi\Exceptions\TraccarApiCallException;
use Harrometer\TraccarLaravelApi\Models\Device;
use Harrometer\TraccarLaravelApi\Tests\BaseTestCase;

class DestroyTest extends BaseTestCase
{
    /**
     * @dataProvider getDevicesIds
     */
    public function testDestroy(string $deviceId): void
    {
        Device::destroy($deviceId);
        self::assertNull(Device::find($deviceId));
    }

    public function getDevicesIds(): array
    {
        return [
            ['607024'],
        ];
    }
}
