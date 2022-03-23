<?php

use Illuminate\Support\Facades\Route;
use Harrometer\TraccarLaravelApi\Models\Device;

Route::get('test', function () {

    $device = Device::find(14);
    return $device;
});
