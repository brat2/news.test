<?php

namespace App\Models;

use App\Models\Sity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    public function sity()
    {
        return $this->belongsTo(Sity::class);
    }

}
