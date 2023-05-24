<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lyric extends Model
{
    use HasFactory;

    protected $fillable = ['band_id', 'album_id', 'title', 'slug', 'lyric_body'];

    public function band()
    {
        return $this->belongsTo(Band::class);
    }

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
