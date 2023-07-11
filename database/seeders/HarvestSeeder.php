<?php

namespace Database\Seeders;

use App\Imports\HarvestFishImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class HarvestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new HarvestFishImport, public_path("data/harvest_fishery.xlsx"));
    }
}
