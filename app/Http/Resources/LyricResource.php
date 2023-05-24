<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LyricResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'band' => $this->band->band_name,
            'album' => $this->album->album_name,
            'title' => $this->title,
            'lyric' => $this->lyric_body
        ];
    }
}
