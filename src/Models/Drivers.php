<?php

namespace Harrometer\TraccarLaravelApi\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Harrometer\TraccarLaravelApi\Facades\Client;

class Drivers extends Model
{
    const ENDPOINT = 'drivers';

    protected $fillable = [
        'id',
        'name',
        'uniqueId',
        'attributes',
    ];

    public function getName(): string
    {
        return $this->name;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public static function find(string $id)
    {
        $response = Client::get(self::ENDPOINT, [
            'uniqueId' => $id,
        ]);

        $devices = Device::hydrate($response);

        return $devices->first() ?? null;
    }

    public static function destroy($id)
    {
        $url = sprintf('%s/%s', self::ENDPOINT, $id);
        Client::delete($url);

        return $id;
    }

    public function delete()
    {
        return self::destroy($this->id);
    }

    /**
     * @param $name
     * @param null $uniqueId
     * @param null $attributes
     * @return mixed
     * @throws \JsonException
     */
    public static function store($name, $uniqueId = null, $attributes = null)
    {
        $traccarAttributes = [
            'id' => -1,
            'name' => $name,
            'uniqueId' => $uniqueId ?? Str::uuid(),
            'attributes',
        ];

        if (!empty($attributes)) {
            $traccarAttributes = array_merge($traccarAttributes, $attributes);
        }

        $result = Client::post(self::ENDPOINT, [], [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body' => json_encode($traccarAttributes, JSON_THROW_ON_ERROR)
        ]);

        return Device::hydrate([$result])->first();
    }

    //

    public static function put($name, $uniqueId = null, $attributes = null)
    {
        $traccarAttributes = [
            'id' => -1,
            'name' => $name,
            'uniqueId' => $uniqueId ?? Str::uuid(),
            'attributes',
        ];

        if (!empty($attributes)) {
            $traccarAttributes = array_merge($traccarAttributes, $attributes);
        }

        $result = Client::put(self::ENDPOINT, [], [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body' => json_encode($traccarAttributes, JSON_THROW_ON_ERROR)
        ]);

        return Device::hydrate([$result])->first();
    }

    //


}
