<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','thumbnail','status'];

    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn ( $name ) => Str::title( $name ),
        );
    }
}
