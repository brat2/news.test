<?php

namespace App\Models;

use App\Models\City;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function users()
    {
        return $this->BelongsToMany(User::class, 'news_user')->withTimestamps();
    }
}
