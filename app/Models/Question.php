<?php

namespace App\Models;

use App\Models\Category;
use App\Models\UserLikeQuestion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(UserCommentQuestion::class);
    }

    public function likes()
    {
        return $this->hasMany(UserLikeQuestion::class);
    }
}
