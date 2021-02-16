<?php

namespace App\Models;

use App\Models\File;
use App\Models\Folder;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * boot
     *
     * @return void
     */
    public static function booted()
    {
        static::creating(function (User $user) {
            $user->uuid = Str::uuid();
        });
    }

    /**
     * articles
     *
     * @return void
     */
    public function articles()
    {
        return $this->hasMany(Article::class)
            ->latest();
    }

    /**
     * categories
     *
     * @return void
     */
    public function categories()
    {
        return $this->hasMany(Category::class)
            ->latest();
    }


    /**
     * tags
     *
     * @return void
     */
    public function tags()
    {
        return $this->hasMany(Tag::class)
            ->latest();
    }

    /**
     * objects
     *
     * @return void
     */
    public function objects()
    {
        return $this->hasMany(Obj::class);
    }

    /**
     * files
     *
     * @return void
     */
    public function files()
    {
        return $this->hasMany(File::class);
    }

    /**
     * folders
     *
     * @return void
     */
    public function folders()
    {
        return $this->hasMany(Folder::class);
    }

    /**
     * medias
     *
     * @return void
     */
    public function medias()
    {
        return $this->hasMany(Media::class)
            ->latest();
    }
}