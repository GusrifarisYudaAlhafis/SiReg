<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnggotaUmumRequest extends FormRequest
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
            'nama' => ['required', 'string'],
            'ttl' => ['required', 'string'],
            'jenis_kelamin' => ['required', 'string'],
            'alamat' => ['required'],
            'hp' => ['required', 'string'],
        ];
    }
}
