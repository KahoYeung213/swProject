<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Module;


class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_name',
        'number_of_students',
        'user_id',
        'course_image'
    ];

    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}
