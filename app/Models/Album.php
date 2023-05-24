<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['band_id', 'album_name', 'album_year', 'album_poster', 'slug'];

    public function band()
    {
        return $this->belongsTo(Band::class);
    }

    public function lyrics()
    {
        return $this->hasMany(Lyric::class);
    }
}
