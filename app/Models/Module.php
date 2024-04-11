<?php

namespace App\Models;

//imports the classes from laravel
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//inherits Model functions
class Module extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'module_name',
        'credits',
        'module_image',
    ];
}
