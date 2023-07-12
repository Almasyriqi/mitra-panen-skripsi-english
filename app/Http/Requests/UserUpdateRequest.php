<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name'          => 'required',
            'email'         => ['required', 'email'],
            'phone_number'  => ['required'],
            'role'          => 'required',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'name.required'              => 'Nama harus diisi.',
    //         'email.required'             => 'Email harus diisi.',
    //         'email.email'                => 'Format email salah.',
    //         'phone_number.required'      => 'No Hp harus diisi.',
    //         'role.required'              => 'Role harus diisi.',
    //     ];
    // }
}
