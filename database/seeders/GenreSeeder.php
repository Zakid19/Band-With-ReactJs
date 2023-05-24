<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = collect([
            'Classic Rock',
            'Soft Rock',
            'Hard Rock',
            'Punk',
            'Grunge',
            'Alternative',
            'Indie Rock',
            'Progressive Rock',
            'Post-Rock',
            'Pop',
            'Indie Pop',
            'Electropop',
            'Latin Pop',
            'Hip Hop',
            'Rap',
            'R&B',
            'Electronic',
            'Electronica',
            'Electronic Rock',
            'Dubstep',
            'Drum and Bass',
            'Techno',
            'Eurodance',
            'Disco',
            'Boogie',
            'Boogie-Woogie',
            'Swing',
            'Funk',
            'Blues',
            'Jazz',
            'New Wave',
            'Folk',
            'American Folk Revival',
            'Classic Country',
            'Country Blues',
            'Modern Country',
            'Bluegrass',
            'Honky-Tonk',
            'Americana',
            'Rock and Roll',
            'Metal',
            'Industrial',
            'Pop Rock',
            'Reggae',
            'Ska',
            'Psychedelic',
            'Soul',
            'Gospel',
            'Choral',
            'A Cappella',
            'Opera',
            'Orchestral',
            'Classical',
            'Flamenco',
            'Salsa',
            'Reggaeton',
            'Lounge',
            'Experimental',
            'Ambient',
            'New Age',
            'K-Pop',
            'Trap',
            'Trance',
            'House',
            'Grime',
            'World Music',
            'Celtic',
            'Bossa Nova',
            'Alternative Hip-Hop',
            'Crunk',
            'Shoegaze',
            'Ragtime',
            'Big Band',
            'Breakbeat',
            'Italo Disco',
            'Instrumental',
            'Easy Listening',
            'Surf Rock',
            'Calypso',
            'Garage',
        ]);

        $genres->each(function($genre) {
            Genre::create([
                'genre_name' => $genre,
                'slug' => Str::slug($genre)
            ]);
        });
    }
}
