<?php

namespace App\Http\Requests\Outline;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOutlineMahasiswaRequest extends FormRequest
{
    /**
     * Determine if the mahasiswa is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->role == 'mahasiswa';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}
