<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\UserLikeAnswer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends Model
{
    use HasFactory;

    protected $guarded = ["id"];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function likes()
    {
        return $this->hasMany(UserLikeAnswer::class);
    }
}
