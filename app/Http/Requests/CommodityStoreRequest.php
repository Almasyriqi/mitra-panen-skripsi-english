<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommodityStoreRequest extends FormRequest
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
            'latin_name'    => 'required',
            'duration'      => ['required', 'numeric'],
            'cover'         => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'          => 'Nama harus diisi.',
            'latin_name.required'    => 'Nama latin harus diisi.',
            'duration.required'      => 'Durasi budidaya harus diisi.',
            'cover.required'         => 'Cover harus diupload.',
        ];
    }
}
