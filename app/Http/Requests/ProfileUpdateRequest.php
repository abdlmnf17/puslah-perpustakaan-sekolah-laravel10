<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $userId = $this->user()->id;

        return [
            'nama' => ['required', 'string', 'max:255'],
            'identitas' => [
                'required',
                'string',
                'max:25',
                Rule::unique('users')->ignore($userId),
            ],
            'telepon' => ['nullable', 'string', 'max:15'],
            'alamat' => ['nullable', 'string', 'max:255'],
            'kelas' => ['nullable', 'string', 'max:20'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique('users')->ignore($userId),
            ],
        ];
    }
}
