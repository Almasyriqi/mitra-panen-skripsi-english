<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Traits\FileStore;
use App\Traits\PhoneNumberFormatter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    use PhoneNumberFormatter, FileStore;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // query get user data
            $query = User::when($request->filter, function ($query) use ($request) {
                if ($request->filter == 'admin') {
                    $query->where('role', User::ADMIN);
                } else if ($request->filter == 'mitra') {
                    $query->where('role', User::MITRA);
                }
            })->get();

            // setup datatable
            return DataTables::of($query)
                ->addColumn('checkbox', function ($item) {
                    $checkbox = '<input  class="form-check-input id-check" type="checkbox" name="id[]" value="' . $item->id . '">';
                    return $checkbox;
                })
                ->addColumn('name', function ($item) {
                    return $item->name;
                })
                ->addColumn('joinedSince', function ($item) {
                    return $item->joined_since;
                })
                ->addColumn('role', function ($item) {
                    return $item->role_name;
                })
                ->addColumn('phonenumber', function ($item) {
                    return $item->phone_number;
                })
                ->addColumn('pondsAmount', function ($item) {
                    return $item->ponds_amount;
                })
                ->addColumn('actions', function ($item) {
                    $button = ' <a href="' . route('user.show', $item->id) . '"
                                class="btn btn-light btn-active-light-primary btn-sm">Show</a> ';
                    return $button;
                })
                ->rawColumns(['checkbox', 'name', 'joinedSince', 'role', 'phonenumber', 'actions'])
                ->make(true);
        }
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $user               = new User();
            $user->avatar       = $this->getPathFile($request->file('avatar'), 'avatar');
            $user->name         = $request->name;
            $user->email        = $request->email;
            $user->phone_number = $this->format($request->phone_number);
            $user->role         = $request->role;
            $user->password     = Hash::make($request->password);
            $user->save();
            DB::commit();
            return redirect()->route('user.index')->with('success', 'Successfully add a new user');
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
        $user = User::find($id);
        return view('admin.users.show', compact('user'));
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
    public function update(UserUpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $user = User::find($id);

            if($request->file('avatar')){
                File::delete(public_path("storage/".$user->avatar));
                $user->avatar = $this->getPathFile($request->file('avatar'), 'avatar');
            }

            $user->name         = $request->name;
            $user->email        = $request->email;
            $user->phone_number = $this->format($request->phone_number);
            $user->role         = $request->role;
            $user->save();

            DB::commit();
            return redirect()->route('user.show', $user->id)->with('success', 'Successfully update user data');
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

    public function deleteUser(Request $request)
    {
        DB::beginTransaction();
        try {
            $users = User::whereIn('id', $request->user_id)->get();
            foreach ($users as $user) {
                File::delete(public_path("storage/".$user->avatar));
                $user->delete();
            }

            DB::commit();
            return response()->json([
                'status' => '200',
                'users' => $users,
                'message' => "user successfully deleted",
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
