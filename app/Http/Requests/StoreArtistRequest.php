<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArtistRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'artist_nickname' => 'required|unique:artists|max:30',
            'introduction_text' => 'required|string|max:1000',
            'profile_photo' => 'nullable|image|max:4096',
            'address' => 'required|string|max:50',
            'phone_number' => 'required|string|max:20'
        ];
    }
}
