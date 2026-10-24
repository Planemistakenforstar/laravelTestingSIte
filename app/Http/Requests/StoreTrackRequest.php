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
            'file' => ['required', 'file', 'mimetypes:audio/mpeg,audio/wav,audio/x-wav', 'max:102400'],
            'airplay_permission' => ['accepted'],
        ];
    }

    public function messages(): array
    {
        return [
            'file.max' => 'The audio file must be 100 MB or smaller.',
            'file.mimetypes' => 'Only mp3 or wav files are allowed.',
            'airplay_permission.accepted' => 'You must grant airplay permission to upload.',
        ];
    }
}
