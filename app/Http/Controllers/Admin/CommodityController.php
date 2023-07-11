<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommodityStoreRequest;
use App\Http\Requests\CommodityUpdateRequest;
use App\Models\FishType;
use App\Traits\FileStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;

class CommodityController extends Controller
{
    use FileStore;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // query get user data
            $query = FishType::get();

            // setup datatable
            return DataTables::of($query)
                ->addColumn('checkbox', function ($item) {
                    $checkbox = '<input  class="form-check-input id-check" type="checkbox" name="id[]" value="' . $item->id . '">';
                    return $checkbox;
                })
                ->addColumn('name', function ($item) {
                    return $item->name;
                })
                ->addColumn('latin_name', function ($item) {
                    return $item->latin_name;
                })
                ->addColumn('duration', function ($item) {
                    return $item->duration_time;
                })
                ->addColumn('actions', function ($item) {
                    $button = ' <a href="' . route('commodity.show', $item->id) . '"
                                class="btn btn-light btn-active-light-primary btn-sm">Show</a> ';
                    return $button;
                })
                ->rawColumns(['checkbox', 'name', 'latin_name', 'duration', 'actions'])
                ->make(true);
        }
        return view('admin.commodity.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.commodity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommodityStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $commodity              = new FishType();
            $commodity->name        = $request->name;
            $commodity->latin_name  = $request->latin_name;
            $commodity->duration    = $request->duration_type == 'bulan' ? ($request->duration * 31) : $request->duration;
            $commodity->photo       = $this->getPathFile($request->file('cover'), 'photo_commodity');
            
            if($request->selling_price){
                $selling_price = str_replace('Rp ', '', $request->selling_price);
                $selling_price = str_replace('.', '', $selling_price);
                $commodity->selling_price = $selling_price;
            }

            if($request->temp_bottom && $request->temp_up){
                $commodity->temperature = $request->temp_bottom . "-" . $request->temp_up;
            }
            
            if($request->ph_bottom && $request->ph_up){
                $commodity->ph = $request->ph_bottom . "-" . $request->ph_up;
            }

            if($request->water_height_bottom && $request->water_height_up){
                $commodity->water_height = $request->water_height_bottom . "-" . $request->water_height_up;
            }

            $commodity->water_type              = $request->water_type;
            $commodity->preparation_description = $request->preparation_description;
            $commodity->seeding_description     = $request->seeding_description;
            $commodity->cutivation_description  = $request->cutivation_description;
            $commodity->save();

            DB::commit();
            return redirect()->route('commodity.index')->with('success', 'Berhasil menambahkan komoditas baru');
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('toast_error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $commodity = FishType::find($id);
        $temp = $commodity->temperature ? explode('-', $commodity->temperature) : [0,0];
        $ph = $commodity->ph ? explode('-', $commodity->ph) : [0,0];
        $water_height = $commodity->water_height ? explode('-', $commodity->water_height) : [0,0];
        return view('admin.commodity.show', compact('commodity', 'temp', 'ph', 'water_height'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommodityUpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $commodity = FishType::find($id);
            $commodity->name        = $request->name;
            $commodity->latin_name  = $request->latin_name;
            $commodity->duration    = $request->duration_type == 'bulan' ? ($request->duration * 31) : $request->duration;

            if($request->file('cover')){
                File::delete(public_path("storage/".$commodity->photo));
                $commodity->photo = $this->getPathFile($request->file('cover'), 'photo_commodity');
            }
            
            if($request->selling_price){
                $selling_price = str_replace('Rp ', '', $request->selling_price);
                $selling_price = str_replace('.', '', $selling_price);
                $commodity->selling_price = $selling_price;
            }

            if($request->temp_bottom && $request->temp_up){
                $commodity->temperature = $request->temp_bottom . "-" . $request->temp_up;
            }
            
            if($request->ph_bottom && $request->ph_up){
                $commodity->ph = $request->ph_bottom . "-" . $request->ph_up;
            }

            if($request->water_height_bottom && $request->water_height_up){
                $commodity->water_height = $request->water_height_bottom . "-" . $request->water_height_up;
            }

            $commodity->water_type              = $request->water_type;
            $commodity->preparation_description = $request->preparation_description;
            $commodity->seeding_description     = $request->seeding_description;
            $commodity->cutivation_description  = $request->cutivation_description;
            $commodity->save();
            DB::commit();
            return redirect()->route('commodity.show', $commodity->id)->with('success', 'Berhasil update data komoditas');
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('toast_error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deleteCommodity(Request $request)
    {
        DB::beginTransaction();
        try {
            $commodities = FishType::whereIn('id', $request->commodity_id)->get();
            foreach ($commodities as $commodity) {
                File::delete(public_path("storage/".$commodity->photo));
                $commodity->delete();
            }

            DB::commit();
            return response()->json([
                'status' => '200',
                'commodities' => $commodities,
                'message' => "komoditas berhasil dihapus",
            ], 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'status' => '500',
                'message' => $th->getMessage(),
            ], 500);
        }
    }
}
