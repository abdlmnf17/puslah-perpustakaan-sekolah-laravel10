<?php

namespace App\Http\Requests;
use App\Models\Setting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_web' => 'required|string|max:2',
            'deskripsi' => 'nullable|string',
        ];
    }


    public function messages()
    {
        return [
            'nama_web.required' => 'Nama website harus diisi.',
            'nama_web.string' => 'Nama website harus berupa teks.',
            'nama_web.max' => 'Nama website tidak boleh lebih dari :max karakter.',
            'deskripsi.string' => 'Deskripsi harus berupa teks.',
        ];
    }
}
