<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function comments()
    {
        return $this->hasMany(UserCommentQuestion::class);
    }

    protected static function boot()
    {
        parent::boot();

        // mendefinisikan fungsi ketika akan di simpan ke dalam database
        static::creating(function ($user) {
            // meng hash password ketika sedang membuat user / save ke database
            $hash = Hash::make($user->password);
            $user->password = $hash;
        });

        self::updating(function ($user) {
            // meng hash kembali apabila terdapat perubahan pada password 
            if ($user->isDirty(["password"])) {
                $hash = Hash::make($user->password);
                $user->password = $hash;
            }
        });
    }

    public function verifiyPassword($password)
    {
        return Hash::check($password, $this->password);
    }
}
