<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    use HasFactory;

    protected $fillable = ['band_name', 'band_poster', 'slug'];

    public function genres()
    {
        return $this->belongsToMany('App\Models\Genre');
    }

    public function albums()
    {
        return $this->hasMany(Album::class);
    }

    public function lyrics()
    {
       return $this->hasMany(Lyric::class);
    }
}
