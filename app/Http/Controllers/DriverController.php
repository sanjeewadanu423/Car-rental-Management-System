<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\User;
use Illuminate\Http\Request;


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
    public function index(Request $request)
    {
        $drivers = Driver::latest()->paginate(5);
        foreach($drivers as $driver){

        $user[]=Driver::find($driver->id)->user;

        }


        return view('drivers.index',compact('drivers','user'))
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

        request()->validate([
            'user_id' => 'required',
            // 'email' => 'required|email',
            'driver_address' => 'required',
            'driver_phone' => 'required',
            'driber_nic' => 'required',
            'driver_age' => 'required',
            // 'driver_photo' => 'required',
            'driver_type' => 'required',
            'price_per_date' => 'required',
        ]);

        Driver::create($request->all());
        User::create($request->all());

        return redirect()->route('drivers.index')
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
        $user = User::get();
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
}
