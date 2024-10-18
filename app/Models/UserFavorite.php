<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFavorite extends Model
{
    protected $fillable = ['user_id', 'cat_id', 'breed_name'];

    public function user()
    {
        return $this->belongsTo(User::class, 'cat_id');
    }
}
