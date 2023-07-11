<?php

namespace App\Imports;

use App\Models\HarvestFish;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HarvestFishImport implements ToModel, WithHeadingRow, WithCalculatedFormulas
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new HarvestFish([
            'id' => $row['id'],
            'fish_type_id' => $row['fish_type_id'],
            'sow_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['sow_date']),
            'seed_amount' => $row['seed_amount'],
            'seed_weight' => $row['seed_weight'],
            'survival_rate' => $row['survival_rate'],
            'average_weight' => $row['average_weight'],
            'fish_amount' => $row['fish_amount'],
            'pond_volume' => $row['pond_volume'],
            'total_feed_spent' => $row['total_feed_spent'],
            'harvest_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['harvest_date']),
            'harvest_amount' => $row['harvest_amount'],
        ]);
    }
}
