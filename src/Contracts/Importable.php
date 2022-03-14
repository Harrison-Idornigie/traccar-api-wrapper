<?php

namespace Harrometer\TraccarLaravelApi\Contracts;

interface Importable
{
    public static function fromArray(array $object): Importable;
}
