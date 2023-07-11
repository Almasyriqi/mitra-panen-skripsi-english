<?php

namespace App\Imports;

use App\Models\FishType;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FishTypeImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new FishType([
            'id' => $row['id'],
            'name' => $row['name'],
            'slug' => $row['slug'],
            'latin_name' => $row['latin_name'],
            'duration' => $row['duration'],
            'photo' => $row['photo'],
            'selling_price' => $row['selling_price'],
            'temperature' => $row['temperature'],
            'ph' => $row['ph'],
            'water_height' => $row['water_height'],
            'water_type' => $row['water_type'],
            'preparation_description' => $row['preparation_description'],
            'seeding_description' => $row['seeding_description'],
            'cutivation_description' => $row['cutivation_description']
        ]);
    }
}
