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

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // public function user()
    // {
    //     return $this->belongsToMany(User::class)->withTimestamps();
    // }
}
