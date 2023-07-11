<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HarvestStoreRequest extends FormRequest
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
            'fish_type'             => 'required',
            'sow_date'              => 'required',
            'price_one_seed'        => 'required',
            'seed_amount'           => ['required', 'min:1'],
            'seed_weight'           => ['required', 'min:1'],
            'sr'                    => ['required', 'min:0', 'max:100'],
            'fcr'                   => ['required', 'min:0'],
            'target_fish_count'     => ['required', 'min:1', 'max:100'],
            'target_price'          => 'required',
        ];
    }

    public function messages()
    {
        return [
            'fish_type.required'            => 'Jenis komoditas harus dipilih.',
            'sow_date.required'             => 'Tanggal tebar bibit harus diisi.',
            'price_one_seed.required'       => 'Harga satu ekor bibit harus diisi.',
            'seed_amount.required'          => 'Jumlah bibit harus diisi.',
            'seed_amount.min'               => 'Jumlah bibit minimal 1.',
            'seed_weight.required'          => 'Berat bibit harus diisi',
            'seed_weight.min'               => 'Berat bibit minimal 1 gram.',
            'sr.required'                   => 'Survival Rate harus diisi',
            'sr.min'                        => 'Survival Rate minimal 0',
            'sr.max'                        => 'Survival Rate maksimal 100',
            'fcr.required'                  => 'Feed Conversion Ratio harus diisi.',
            'fcr.min'                       => 'Feed Conversion Ratio minimal 0',
            'target_fish_count.required'    => 'Target jumlah ikan per kilogram harus diisi.',
            'target_fish_count.min'         => 'Target jumlah ikan per kilogram minimal 1',
            'target_fish_count.max'         => 'Target jumlah ikan per kilogram maksimal 100',
            'target_price.required'         => 'Target harga jual per kilogram harus diisi.' 
        ];
    }
}
