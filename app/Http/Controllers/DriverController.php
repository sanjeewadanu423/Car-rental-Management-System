<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DriverController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:driver-list|driver-create|driver-edit|driver-delete', ['only' => ['index','show']]);
         $this->middleware('permission:driver-create', ['only' => ['create','store']]);
         $this->middleware('permission:driver-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:driver-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = DB::table('users')
            ->join('drivers', 'users.id', '=', 'drivers.user_id')
            ->select('users.*', 'drivers.*')
            ->paginate(5);

            // dd($drivers);


        // $drivers = Driver::latest()->paginate(5);
        // foreach($drivers as $driver){


        // $user[]=Driver::find($driver->id)->user;

        // }


        return view('drivers.index',compact('drivers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::get();

        return view('drivers.create' , compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // request()->validate([
        //     'user_id' => 'required',
        //     // 'email' => 'required|email',
        //     'driver_address' => 'required',
        //     'driver_phone' => 'required',
        //     'driber_nic' => 'required',
        //     'driver_age' => 'required',
        //     // 'driver_photo' => 'required',
        //     'driver_type' => 'required',
        //     'price_per_date' => 'required',
        // ]);

        // Driver::create($request->all());
        // User::create($request->all());

        request()->validate([
            'name'=> 'required',
            'email'=> 'required',
            'driver_phone'=> 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        $driver = new Driver;
        $driver->driver_address = $request->driver_address;
        $driver->driver_phone = $request->driver_phone;
        $driver->driver_age = $request->driver_age;
        $driver->driber_nic = $request->driber_nic;
        $driver->driver_photo = $request->driver_photo;
        $driver->driver_type = $request->driver_type;
        $driver->price_per_date = $request->price_per_date;

        if($request->hasFile('file')) {
            $imageName = time().'.'.$request->file->extension();

            $request->file->move(public_path('img'), $imageName);

            $driver->driver_photo = $imageName;



            }


        $user->driver()->save($driver);

        $user->assignRole('driver');

        return redirect()->route('drivers')
                        ->with('success','driver created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        // dd($driver);
        $driver = DB::table('users')
            ->join('drivers', 'users.id', '=', 'drivers.user_id')
            ->select('users.*', 'drivers.*', 'drivers.id as driver_id')
            ->get();

// dd($drivers);

        // $user = User::get();

        // dd($user);
        return view('drivers.show',compact('driver'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        $user = User::get();

        return view('drivers.edit',compact('driver' , 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver)
    {
        request()->validate([
            'user_id' => 'required',
            // 'email' => 'required|email',
            'driver_address' => 'required',
            'driver_phone' => 'required',
            'driber_nic' => 'required',
            'driver_age' => 'required',
            // 'driver_photo' => 'required|image',
            'driver_type' => 'required',
            'price_per_date' => 'required',
        ]);

        $driver->update($request->all());

        return redirect()->route('drivers')
                        ->with('success','driver updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();

        return redirect()->route('drivers')
                        ->with('success','driver deleted successfully');
    }

    public function statusYes($did)
    {
        $driver=Driver::find($did);
        $driver->driver_status='yes';
        $driver->save();
        // dd($driver);

        return redirect()->back();
    }

    public function statesNo($did)
    {
        // dd($vid);
        $driver=Driver::find($did);
        // dd($driver);
        $driver->driver_status='no';
        $driver->save();
        // dd($driver);

        return redirect()->back();
    }

    public function showProfile($driverid)
    {
        // dd($driverid);
        $drivers = DB::table('users')
            ->join('drivers', 'users.id', '=', 'drivers.user_id')
            ->where('drivers.id', '=' , $driverid)
            ->select('users.*', 'drivers.*')
            ->get();

// dd($drivers);

        // $user = User::get();

        // dd($user);
        return view('drivers.show',compact('drivers'));
    }
}
