<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AlbumRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', Rule::unique('albums','album_name')->where(function($band) {
                return $band->where('band_id', $this->band_id);
            })],
            'band' => 'required',
            'year' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gift,svg',
        ];
    }
}
