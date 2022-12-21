<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $data=DB::table('vehicles')
        //     ->join('vehicle_types', 'vehicle_types.vehicle_type_id' , '=' , 'vehicle.id')

        //  $vehicles = Vehicle::latest()->paginate(5);

         $vehicles = DB::table('vehicle_types')
         ->join('vehicles', 'vehicle_types.id', '=', 'vehicles.vehicle_type_id')
        //  ->join('drivers', 'users.id', '=', 'drivers.user_id')
        //  ->join('vehicles', 'users.id', '=', 'vehicles.user_id')
         ->select('vehicle_types.*', 'vehicles.*')
         ->paginate(5);




        return view('vehicles.index',compact('vehicles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::get();
        return view('vehicles.create' , compact('types'));
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
            'vehicle_name' => 'required',
            // 'vehicle_type_name' => 'required',
            'vehicle_reg_no' => 'required',
            'vehicle_l_h' => 'required',
            'price_per_date' => 'required',
            'passengers' => 'required',
            'transmission' => 'required',
            'luggage' => 'required',
            'air_condition' => 'required',
            'fuel' => 'required',
            'vehicle_states' => 'required',
            'price_for_extra_km' => 'required',
            'engine_capacity' => 'required',
        ]);

        $vehicle = new Vehicle;


        $vehicle->vehicle_type_id = $request->vehicle_type_id ;
        $vehicle->vehicle_name = $request->vehicle_name;
        $vehicle->vehicle_reg_no = $request->vehicle_reg_no;
        $vehicle->vehicle_l_h = $request->vehicle_l_h;
        $vehicle->price_per_date = $request->price_per_date;
        $vehicle->passengers = $request->passengers;
        $vehicle->transmission = $request->transmission;
        $vehicle->luggage = $request->luggage;
        $vehicle->air_condition = $request->air_condition;
        $vehicle->fuel = $request->fuel;
        $vehicle->vehicle_states = $request->vehicle_states;
        $vehicle->price_for_extra_km = $request->price_for_extra_km;
        $vehicle->engine_capacity = $request->engine_capacity;

        // dd($vehicle);
        if($request->hasFile('file')) {
            $imageName = time().'.'.$request->file->extension();

            $request->file->move(public_path('img'), $imageName);

            $vehicle->vehicle_photo = $imageName;

            }


            // Vehicle::create($request->all());

            $vehicle->save();
        return redirect()->route('vehicles')
                        ->with('success','Vehicle created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show',compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)

    {
        $types = Type::get();
        return view('vehicles.edit',compact('vehicle', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        request()->validate([
            'vehicle_name' => 'required',
            // 'vehicle_type_name' => 'required',
            'vehicle_reg_no' => 'required',
            'vehicle_l_h' => 'required',
            'price_per_date' => 'required',
            'passengers' => 'required',
            'transmission' => 'required',
            'luggage' => 'required',
            'air_condition' => 'required',
            'fuel' => 'required',
            'vehicle_states' => 'required',
            'price_for_extra_km' => 'required',
            'engine_capacity' => 'required',
        ]);

        $vehicle->update($request->all());

        return redirect()->route('vehicles')
                        ->with('success','Vehicle updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect()->route('vehicles')
                        ->with('success','Vehicle deleted successfully');
    }

    public function changeStatus(Request $request)
    {
        $vehicle = Vehicle::find($request->vehicle_id);

        $vehicle->vehicle_states = $request->vehicle_states;
        $vehicle->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    public function statusYes($vid)
    {
        $vehicle=Vehicle::find($vid);
        $vehicle->vehicle_states='yes';
        $vehicle->save();
        // dd($vehicle);

        return redirect()->back();
    }

    public function statesNo($vid)
    {
        // dd($vid);
        $vehicle=Vehicle::find($vid);
        // dd($vehicle);
        $vehicle->vehicle_states='no';
        $vehicle->save();
        // dd($vehicle);

        return redirect()->back();
    }

    public function vehicleProfile($vehicleid)
    {
        // dd($customerid);
        $vehicles = DB::table('vehicle_types')
            ->join('vehicles', 'vehicle_types.id', '=', 'vehicles.vehicle_type_id')
            ->where('vehicles.id', '=' , $vehicleid)
            ->select('vehicle_types.*', 'vehicles.*')
            ->get();

// dd($vehicles);

        // $user = User::get();

        // dd($user);
        return view('vehicles.show',compact('vehicles'));
    }
}
