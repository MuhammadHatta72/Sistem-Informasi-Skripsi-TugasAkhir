<?php

namespace App\Http\Requests\Outline;

use Illuminate\Foundation\Http\FormRequest;

class StoreOutlineMahasiswaRequest extends FormRequest
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
            'judul1' => 'required',
            'judul2' => 'required',
            'bidang1' => 'required',
            'bidang2' => 'required',
            'pendahuluan1' => 'required',
            'pendahuluan2' => 'required',
            'pendahuluan3' => 'required',
            'teori1' => 'required',
            'teori2' => 'required',
            'metpen1' => 'required',
            'metpen2' => 'required',
        ];
    }
}
