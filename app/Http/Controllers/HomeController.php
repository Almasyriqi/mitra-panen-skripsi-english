<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Models\FishType;
use App\Models\HarvestFish;
use App\Models\User;
use App\Traits\FileStore;
use App\Traits\PhoneNumberFormatter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    use PhoneNumberFormatter, FileStore;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Auth::user()->role;
        if ($role == User::ADMIN) {
            toast()->success('Success', 'Successfully login as Admin');
        } else if ($role == User::MITRA) {
            toast()->success('Success', 'Successfully login as Mitra Panen');
        } else {
            alert()->error('Error', 'Error on login');
            return redirect()->to('/');
        }
        return redirect()->route('home');
    }

    public function home()
    {
        if (Auth::user()->role == User::ADMIN) {
            // count data
            $users = User::all()->count();
            $mitra = User::where('role', User::MITRA)->count();
            $admin = User::where('role', User::ADMIN)->count();
            $commodity = FishType::all()->count();
            return view('admin.home_admin', compact('users', 'mitra', 'admin', 'commodity'));
        } else {
            return view('home');
        }
    }

    public function getData()
    {
        // get data sr commodity
        $fish_id = HarvestFish::distinct()->pluck('fish_type_id');
        $fish_type = [];
        $fish_sr = [];
        $fish_harvest = [];
        foreach ($fish_id as $id) {
            $harvest = HarvestFish::where('fish_type_id', $id)->get();
            if (count($harvest) > 1) {
                // calculate average sr
                $all_sr = HarvestFish::where('fish_type_id', $id)->pluck('survival_rate')->toArray();
                $sr = array_sum($all_sr) / count($all_sr);

                // calculate harvest amount
                $all_harvest = HarvestFish::where('fish_type_id', $id)->pluck('harvest_amount')->toArray();
                $harvest_amount = array_sum($all_harvest) / count($all_harvest);

                // push data to array
                array_push($fish_type, $harvest->first()->fish->name);
                array_push($fish_sr, $sr);
                array_push($fish_harvest, $harvest_amount);
            }
        }
        $series = [];
        $series[] = [
            "name" => 'Survival Rate (%)',
            "data" => $fish_sr
        ];

        $series_harvest = [];
        $series_harvest[] = [
            "name" => 'Average Harvest Yield (kg)',
            "data" => $fish_harvest
        ];
        return response()->json(['fish_type' => $fish_type, 'series' => $series, 'series_harvest' => $series_harvest]);
    }

    public function profile()
    {
        return view('profile');
    }

    public function updateProfile(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = User::find(Auth::user()->id);

            if ($request->file('avatar')) {
                File::delete(public_path("storage/" . $user->avatar));
                $user->avatar = $this->getPathFile($request->file('avatar'), 'avatar');
            }

            $user->name         = $request->name;
            $user->email        = $request->email;
            $user->phone_number = $this->format($request->phone_number);
            $user->save();

            DB::commit();
            return redirect()->route('profile')->with('success', 'Successfully update profile');
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('toast_error', $th->getMessage());
        }
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $request->user()->update([
            'password' => Hash::make($request->get('password'))
        ]);

        return redirect()->route('profile')->with('success', 'Successfully Change Password');
    }
}
