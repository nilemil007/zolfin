<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method static where(string $string, mixed $login)
 * @method static insert(array[] $users)
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'phone',
        'email',
        'role',
        'status',
        'image',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected string $uploads = 'storage/users/';

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ( $image ) => empty( $image ) ? asset('zolfin/assets/img/default-avatar.png') : $this->uploads . $image,
        );
    }

    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn($password) => Hash::make($password),
        );
    }
}
