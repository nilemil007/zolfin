<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

/**
 * @method static create(array $only)
 * @method static latest()
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','thumbnail','status'];

    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn ( $value ) => [
                'name' => Str::title( $value ),
                'slug' => Str::slug( $value )
            ],
        );
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
