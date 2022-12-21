<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AvailabilityController extends Controller
{
    public function vehicle(Request $request)
    {
        // dd($request);
        request()->validate([
            'service' => 'required',
            'booking_date' => 'required',
            'return_date' => 'required',
            'vehicle_type' => 'required',
        ]);

        // $vehis = DB::table('vehicle_cats')
        //     ->join('vehicle_types', 'vehicle_cats.id', '=', 'vehicle_types.vehicle_cat_id')
        //     ->join('vehicles', 'vehicle_types.id', '=', 'vehicles.vehicle_type_id')
        //     ->where('vehicle_cats.id', '=', $request->vehicle_type)
        //     ->select(  'vehicles.id')
        //     ->get();
        // dd( $vehis);
        // get available vehicle list
        $Bvehicles = Booking::
            where([['booking_date','<', date($request->booking_date)] , ['return_date','>', date($request->booking_date)]])
            ->orwhere('booking_date','=', date($request->booking_date))
            ->orwhere('return_date','=', date($request->booking_date))
            ->orWhere([['booking_date','>', date($request->booking_date)] , ['booking_date','<', date($request->return_date)]])
            ->select('vehicle_id')
            ->get();


        // dd($Bvehicles);
        $varr = json_decode(json_encode ( $Bvehicles ) , true);
// dd($varr);


        $vehicles = DB::table('vehicles')
            ->join('vehicle_types', 'vehicle_types.id', '=', 'vehicles.vehicle_type_id')
            ->where('vehicle_types.vehicle_cat_id', '=', $request->vehicle_type)
            ->select('vehicles.*')
            ->whereNotIn('vehicles.id',$varr)
            ->get();
            // dd($vehicles);

        // $vehis = json_decode(json_encode ( $vehi ) , true);



        // get available driver list
        $Bdrivers = Booking::
        where([['booking_date','<', date($request->booking_date)] , ['return_date','>', date($request->booking_date)]])
        ->orWhere([['booking_date','>', date($request->booking_date)] , ['booking_date','<', date($request->return_date)]])
        ->select('driver_id')
        ->get();

        // dd($Bdrivers);
        $darr = json_decode(json_encode ( $Bdrivers ) , true);

// dd($darr);
        $drivers = DB::table('drivers')
            ->select("drivers.*")
            ->whereNotIn('id',$darr)
            ->get();



            // dd($drivers);

            return view('availability.availability' ,compact('vehicles', 'drivers'));

    }
}
