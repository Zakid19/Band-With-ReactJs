<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = ['genre_name', 'slug'];

    public function bands()
    {
        return $this->belongsToMany(Band::class);
    }

    public function getAllActiveGenres()
    {
        return $this->genres = Genre::get();
    }
}
