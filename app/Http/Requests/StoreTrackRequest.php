<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrackRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isArtist() ?? false;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'genre' => ['nullable', 'string', 'max:100'],
            'city' => ['nullable', 'string', 'max:100'],
            'file' => ['required', 'file', 'mimes:mp3,wav', 'max:20480'],
            'airplay_permission' => ['accepted'],
        ];
    }

    public function messages(): array
    {
        return [
            'airplay_permission.accepted' => 'You must grant airplay permission to upload.',
        ];
    }
}
