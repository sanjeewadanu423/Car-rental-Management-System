<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{




    // public function reland(Request $request)
    // {
    //     return view('index');
    // }

    public function index(Request $request, $page = 1)
    {
        // dd($request);
        // $users = User::get();

        $cars = DB::table('vehicle_cats')
            ->join('vehicle_types', 'vehicle_cats.id', '=', 'vehicle_types.vehicle_cat_id')
            ->join('vehicles', 'vehicle_types.id', '=', 'vehicles.vehicle_type_id')
            ->select('vehicles.*', 'vehicle_types.*','vehicles.id as vehicle_id')
            ->where('vehicle_cats.id', '=', $request->cars)
            ->get();



        return view('lands.cars' ,compact('cars'));


    }

    public function index1(Request $request, $page = 1)
    {
    //    dd($request);
        // $users = User::get();
        $cabs = DB::table('vehicle_cats')
            ->join('vehicle_types', 'vehicle_cats.id', '=', 'vehicle_types.vehicle_cat_id')
            ->join('vehicles', 'vehicle_types.id', '=', 'vehicles.vehicle_type_id')
            ->select('vehicles.*', 'vehicle_types.*','vehicles.id as vehicle_id')
            ->where('vehicle_cats.id', '=', $request->cabs)
            ->get();

        //    dd($cabs);

        return view('lands.cabs' , compact('cabs'));
    }

    public function index2(Request $request, $page = 1)
    {
        // dd($request);
        // $users = User::get();

        $vans = DB::table('vehicle_cats')
            ->join('vehicle_types', 'vehicle_cats.id', '=', 'vehicle_types.vehicle_cat_id')
            ->join('vehicles', 'vehicle_types.id', '=', 'vehicles.vehicle_type_id')
            ->select('vehicles.*', 'vehicle_types.*','vehicles.id as vehicle_id')
            ->where('vehicle_cats.id', '=', $request->vans)
            ->get();

        return view('lands.vans', compact('vans'));
    }

    public function vehi_prof($vid)
    {
        // $vehis = Vehicle::all();
        // dd($vid);

        $vehis = DB::table('vehicle_cats')
            ->join('vehicle_types', 'vehicle_cats.id', '=', 'vehicle_types.vehicle_cat_id')
            ->join('vehicles', 'vehicle_types.id', '=', 'vehicles.vehicle_type_id')
            ->where('vehicles.id', '=', $vid)
            ->select(  'vehicles.*' ,'vehicle_types.*','vehicles.id as vehicle_id')
            ->get();

        $drivs =DB::table('users')
            ->join('drivers', 'users.id', '=', 'drivers.user_id')
            ->select( "drivers.*", "users.*")
            ->get();
        //  dd($drivs);
        return view('lands.prof', compact('vehis', 'drivs'));
    }

    public function driv_prof($did, $vid)
    {
        // dd($did);

        $drivers =DB::table('users')
            ->join('drivers', 'users.id', '=', 'drivers.user_id')
            ->where('drivers.user_id', '=' , $did)
            ->select( "drivers.*", "users.*")
            ->get();
// dd($vid);
        $vehicles =DB::table('vehicles')
            ->select("vehicles.*")
            ->where('vehicles.id', '=', $vid)
            ->get();
            // dd($drivers);

        return view('lands.driver_prof', compact('drivers', 'vehicles'));
    }

    public function land(Request $request)
    {
        $offers = DB::table('offers')
            ->select("offers.*")
            ->get();
        // $offers = Offer::get();

            // dd($offers);

        return view('index', compact('offers'));
    }

    public function bSelf($vid)
    {
        
    }
}
