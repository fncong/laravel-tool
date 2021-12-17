<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function getValueAttribute()
    {
        return self::convert($this->attributes);
    }

    public function setValueAttribute($value)
    {
        switch ($this->attributes['type']) {
            case 'json':
            case 'files':
                $value = json_encode($value, JSON_THROW_ON_ERROR);
                break;
            case 'boolean':
                $value = $value ? 'true' : 'false';
                break;
            case 'integer':
            case 'money':
                $value = (int)$value;
                break;
            case 'float':
                $value = (float)$value;
                break;
            default:
                break;
        }
        $this->attributes['value'] = $value;
    }

    public static function list(array $key)
    {
        $configs = self::query()->whereIn('key', $key)->select(['key', 'value', 'type'])->get()->toArray();
        $data = [];
        foreach ($configs as $index => $config) {
            $data[$config['key']] = $config['value'];
        }
        return $data;
    }

    /**
     * @throws \JsonException
     */
    private static function convert($config)
    {
        switch ($config['type']) {
            case 'json':
            case 'files':
                $json = json_decode($config['value'], true, 3, JSON_THROW_ON_ERROR);
                $value = $json ?? [];
                break;
            case 'boolean':
                $value = $config['value'] === 'true';
                break;
            case 'integer':
            case 'money':
                $value = (int)$config['value'];
                break;
            case 'float':
                $value = (float)$config['value'];
                break;
            case 'rich':
            case 'text':
            case 'image':
            case 'images':
            case 'string':
            default:
                $value = $config['value'];
                break;

        }
        return $value;
    }

    public static function getValue($key, $default = null)
    {
        $config = self::query()->where('key', $key)->select(['key', 'value', 'type'])->first();
        if (!$config) {
            return $default;
        }
        return $config['value'];
    }
}
