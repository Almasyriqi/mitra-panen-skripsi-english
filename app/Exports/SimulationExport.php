<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\FromView;

class SimulationExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        try {
            $url = config('app.api_python_url') . "/implements/result";
            $response = Http::get($url);
            $data = $response->json();
            $collection = collect($data);
            $table1 = collect($collection["table_simulation_1"]);
            $count = $table1->count();
            $table_name = ["table_simulation_1", "table_simulation_2", "table_simulation_3", "table_simulation_4", "table_simulation_5"];
            $table_name = collect($table_name);
            return view('mitra.table_simulation', compact('url', 'collection', 'count', 'table_name'));
        } catch (\Throwable $th) {
            $error = $th->getMessage();
            return view('mitra.error_table', compact('error'));
        }
    }
}
