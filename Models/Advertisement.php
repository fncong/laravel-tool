<?php

namespace App\Models;

use App\Models\Traits\DateTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory, DateTrait;

    protected $fillable = ['title', 'group', 'description', 'image', 'action', 'value', 'weight'];
}
