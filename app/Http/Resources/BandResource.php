<?php

namespace App\Http\Resources;

use App\Models\Genre;
use Illuminate\Http\Resources\Json\JsonResource;

class BandResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $genres = GenreResource::collection($this->genres);
        return [
            'band_name' => $this->band_name,
            'genre_band' => GenreResource::collection($this->genres),
            'band_poster' => $this->band_poster,
            'album' => AlbumResource::collection($this->albums)
        ];
    }
}
