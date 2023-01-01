<?php

namespace App\Models;

use App\Models\User;
use App\Models\Answer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserLikeAnswer extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }
}
