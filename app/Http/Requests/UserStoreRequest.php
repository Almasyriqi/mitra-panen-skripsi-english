<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'avatar'        => 'required',
            'name'          => 'required',
            'email'         => ['required', 'email', 'unique:users,email'],
            'phone_number'  => ['required', 'unique:users,phone_number'],
            'role'          => 'required',
            'password'      => ['required', 'string', 'min:8', 'confirmed']
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'avatar.required'            => 'Foto profil harus diupload.',
    //         'name.required'              => 'Nama harus diisi.',
    //         'email.required'             => 'Email harus diisi.',
    //         'email.email'                => 'Format email salah.',
    //         'email.unique'               => 'Email yang Anda masukkan telah terdaftar',
    //         'phone_number.required'      => 'No Hp harus diisi.',
    //         'phone_number.unique'        => 'No Hp yang Anda masukkan telah terdaftar',
    //         'role.required'              => 'Role harus diisi.',
    //         'password.required'          => 'Password harus diisi.',
    //         'password.confirmed'         => 'Konfirmasi password tidak sesuai.',
    //     ];
    // }
}
