<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PondUpdateRequest extends FormRequest
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
            'address'         => 'required',
            'owner_name'      => 'required',
            'owner_phone'     => 'required',
        ];
    }

    public function messages()
    {
        return [
            'address.required'       => 'Alamat kolam harus diisi',
            'owner_name.required'    => 'Nama pengelola harus diisi.',
            'owner_phone.required'   => 'No Hp pengelola harus diisi.',
        ];
    }
}
