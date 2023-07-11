<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HarvestFish;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RegressionModelController extends Controller
{
    public function train_model(Request $request)
    {
        if ($request->ajax()) {
            // query get user data
            $query = HarvestFish::get();

            // setup datatable
            return DataTables::of($query)
                ->addColumn('fish_type_id', function ($item) {
                    return $item->fish_type_id;
                })
                ->addColumn('seed_amount', function ($item) {
                    return $item->seed_amount;
                })
                ->addColumn('seed_weight', function ($item) {
                    return $item->seed_weight;
                })
                ->addColumn('survival_rate', function ($item) {
                    return $item->survival_rate;
                })
                ->addColumn('average_weight', function ($item) {
                    return $item->average_weight;
                })
                ->addColumn('pond_volume', function ($item) {
                    return $item->pond_volume;
                })
                ->addColumn('total_feed_spent', function ($item) {
                    return $item->total_feed_spent;
                })
                ->addColumn('harvest_amount', function ($item) {
                    return $item->harvest_amount;
                })
                ->rawColumns(['fish_type_id', 'seed_amount', 'seed_weight', 'survival_rate', 'average_weight', 'pond_volume', 'total_feed_spent', 'harvest_amount'])
                ->make(true);
        }
        return view('admin.regression_model.train_model');
    }

    public function test_model()
    {
        return view('admin.regression_model.test_model');
    }
}
