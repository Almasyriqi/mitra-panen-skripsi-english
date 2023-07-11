<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PondStoreRequest extends FormRequest
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
            'amount'          => ['required', 'integer', 'min:1'],
            'address'         => 'required',
            'owner_name'      => 'required',
            'owner_phone'     => 'required',
        ];
    }

    public function messages()
    {
        return [
            'amount.required'        => 'Jumlah kolam harus diisi.',
            'amount.min'             => 'Jumlah kolam minimal harus 1',
            'address.required'       => 'Alamat kolam harus diisi',
            'owner_name.required'    => 'Nama pengelola harus diisi.',
            'owner_phone.required'   => 'No Hp pengelola harus diisi.',
        ];
    }
}
