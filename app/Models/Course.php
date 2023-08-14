<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Casts\Attribute;

class Course extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'name',
        'price'
    ];

    protected $dates = ['updated_at'];

    public function course_name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value)
        );
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'orders');
    }
}