<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    use HasFactory;

    protected $fillable = ['label', 'value', 'group', 'weight'];
    public $timestamps = false;
    public $primaryKey = false;

    public static function getByGroup($group)
    {
        return self::query()->where('group', $group)->orderBy('weight', 'desc')->get();
    }

    public static function getGroupName()
    {
        return self::query()->groupBy('group')->pluck('group');
    }
}
