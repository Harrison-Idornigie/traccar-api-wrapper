<?php

namespace Harrometer\TraccarLaravelApi\Tests\Unit\Helpers;

use Harrometer\TraccarLaravelApi\Tests\BaseTestCase;

class HelpersTest extends BaseTestCase
{
    public function testGetBaseDir(): void
    {
        $expected = realpath(
            sprintf('%s/Helpers.php', __DIR__)
        );
        $result = realpath(
            getBaseDir('tests/Unit/Helpers.php')
        );
        $this->assertSame($expected, $result);
    }
}
