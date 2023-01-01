<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Todolist extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
