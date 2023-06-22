<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

/**
 * @method static where(string $string, mixed $id)
 * @method static latest()
 */
class Post extends Model
{
    use HasFactory;

//    protected $with = ['user', 'category'];

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'content',
        'thumbnail',
        'views',
        'tags',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
    ];

    protected function title(): Attribute
    {
        return Attribute::make(
            set: fn ($title) => [
                'title' => $title,
                'slug' => Str::slug($title),
            ],
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
