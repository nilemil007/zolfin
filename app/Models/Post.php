<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @method static where(string $string, mixed $id)
 * @method static latest()
 * @method static create(array $data)
 * @method static updateOrCreate()
 */
class Post extends Model
{
    use HasFactory;

//    protected $with = ['user', 'category'];
    protected string $filePath = 'storage/posts/thumbnails/';

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'content',
        'thumbnail',
        'views',
        'tags',
        'status',
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

    // Thumbnail
    protected function thumbnail(): Attribute
    {
        return Attribute::make(
            get: fn($thumbnail) => empty($thumbnail) ? asset('zolfin/assets/img/no-thumbnail.jpg') : $this->filePath.$thumbnail,       );
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
