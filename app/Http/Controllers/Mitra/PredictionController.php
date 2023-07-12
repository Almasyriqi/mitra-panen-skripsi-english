<?php

namespace App\Http\Controllers\Mitra;

use App\Exports\SimulationExport;
use App\Http\Controllers\Controller;
use App\Models\FishType;
use App\Models\HarvestFish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;

class PredictionController extends Controller
{
    public function index()
    {
        $fish_type = FishType::all();
        return view('mitra.index_prediction', compact('fish_type'));
    }

    public function getRangeSr(Request $request)
    {
        $sr = HarvestFish::where('fish_type_id', $request->fish_id)->pluck('survival_rate')->toArray();
        $max_sr = max($sr);
        $min_sr = min($sr);
        return response()->json([
            'max_sr' => $max_sr,
            'min_sr' => $min_sr
        ]);
    }

    public function getFishDesc(Request $request)
    {
        $fish = FishType::find($request->fish_id);
        return response()->json([
            "preparation" => $fish->preparation_description,
            "seeding" => $fish->seeding_description,
            "cultivation" => $fish->cutivation_description
        ]);
    }

    public function getVolumePond(Request $request)
    {
        if ($request->seed_amount) {
            if ($request->seed_amount == 1000 || $request->seed_amount == 1500 || $request->seed_amount == 2000) {
                $seed_amount = $request->seed_amount;
                $check = 0;
            } else {
                $seed_amount = 1000;
                $check = 1;
            }
            $volume = HarvestFish::where([['fish_type_id', $request->fish_id], ['seed_amount', $seed_amount]])->distinct()->orderBy('pond_volume')->pluck('pond_volume');
            $data = [];
            foreach ($volume as $v) {
                if ($check == 1) {
                    $v = $request->seed_amount / 1000 * $v;
                    $v = round($v, 2);
                }
                $data[] = [
                    'id' => $v,
                    'text' => $v
                ];
            }
        } else {
            $volume = HarvestFish::where('fish_type_id', $request->fish_id)->distinct()->orderBy('pond_volume')->pluck('pond_volume');
            $data = [];
            foreach ($volume as $v) {
                $data[] = [
                    'id' => $v,
                    'text' => $v
                ];
            }
        }
        return response()->json(['results' => $data]);
    }

    public function getTotalFishCount(Request $request)
    {
        $data = [];
        if ($request->fish_id == 1) {
            $fish_count = [7, 8, 9, 10];
            foreach ($fish_count as $f) {
                $weight = round(1000 / $f, 1);
                $text = strval($weight) . " gram (" . strval($f) . " tails in 1kg sales)";
                $data[] = [
                    'id' => $f,
                    'text' => $text
                ];
            }
        } else if ($request->fish_id == 2 || $request->fish_id == 3) {
            $fish_count = [2, 3, 4];
            foreach ($fish_count as $f) {
                $weight = round(1000 / $f, 1);
                $text = strval($weight) . " gram (" . strval($f) . " tails in 1kg sales)";
                $data[] = [
                    'id' => $f,
                    'text' => $text
                ];
            }
        } else {
            $data[] = [
                'id' => 10,
                'text' => 10
            ];
        }
        return response()->json(['results' => $data]);
    }

    public function downloadExcel()
    {
        return Excel::download(new SimulationExport, 'simulation_data.xlsx');
        // $url = config('app.api_python_url') . "/implements/result";
        // $response = Http::get($url);
        // if ($response->successful()) {
        //     $data = $response->json();
        //     $collection = collect($data);
        //     $table1 = collect($collection["table_simulation_1"]);
        //     $count = $table1->count();
        //     $table_name = ["table_simulation_1", "table_simulation_2", "table_simulation_3", "table_simulation_4", "table_simulation_5"];
        //     $table_name = collect($table_name);
        //     return view('mitra.table_simulation', compact('url', 'collection', 'count', 'table_name'));
        // } else {
        //     return back()->withErrors("Terjadi Error Get API");
        // }
    }
}
