<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogStoreRequest extends FormRequest
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
            'feed_name'     => 'required',
            'feed_spent'    => ['required', 'min:0'],
            'fish_died'     => ['required', 'min:0'],
            'weight'        => ['required', 'min:0'],
        ];
    }

    public function messages()
    {
        return [
            'feed_name.required'     => 'Jenis makanan harus diisi.',
            'feed_spent.required'    => 'Jumlah pakan yang diberikan harus diisi.',
            'feed_spent.min'         => 'Jumlah pakan minimal harus 0',
            'fish_died.required'     => 'Jumlah ikan mati harus diisi',
            'fish_died.min'          => 'Jumlah ikan mati minimal harus 0.',
            'weight.required'        => 'Berat ikan harus diisi.',
            'weight.min'             => 'Berat ikan minimal harus 0',
        ];
    }
}
