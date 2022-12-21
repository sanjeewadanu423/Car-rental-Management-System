<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Driver;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $bookings = Booking::latest()->paginate(5);



        $bookings = DB::table('bookings')
            ->join('vehicles', 'vehicles.id', '=', 'bookings.vehicle_id')

            ->join('customers', 'customers.id', '=', 'bookings.customer_id')
            ->join('offers', 'offers.id', '=', 'bookings.offer_id')

            ->join('drivers', 'drivers.id', '=', 'bookings.driver_id')
            ->join('users as cu', 'cu.id', '=', 'customers.user_id')
            ->join('users as dr', 'dr.id', '=', 'drivers.user_id')



            ->get([
                'cu.name as customer_name',
                'dr.name as driver_name',
                'customers.*',
                'drivers.*',
                'offers.*',
                'vehicles.*',
                'bookings.*'

            ]);






        //dd($bookings);

        return view('bookings.index',compact('bookings'))
            ->with('i', (request()->input('page', 1) - 1) * 5);


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $user = Auth::user()->id;

        // dd($user);

        $customers =DB::table('users')
            ->join('customers', 'users.id', '=', 'customers.user_id')
            ->where('users.id', '=' , $user)
            ->get('customers.id');

         $vprice =DB::table('vehicles')
            ->where('vehicles.id', '=', $request->vehicle_id )
            ->get('price_per_date');
        // dd($vehicle);

        $fdate=$request->booking_date;
        $tdate=$request->return_date;

        $start = Carbon::parse($fdate);
        $end =  Carbon::parse($tdate);

        $days = $end->diffInDays($start);

        $price = $days * $vprice[0]->price_per_date;
// dd($price);
        $booking = new Booking;
        $booking->booking_date = $request->booking_date;
        $booking->return_date = $request->return_date;
        $booking->vehicle_id = $request->vehicle_id;
        $booking->price_for_dates = $price;
        if ($request->driver_id == null){
            $booking->driver_id = 1;
        }
        else{
            $booking->driver_id = $request->driver_id;
        }


        $booking->customer_id = $customers[0]->id;





        $booking->save();

        return redirect()->route('index')
                        ->with('success','Booking created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //dd($booking);
        $drivers = Driver::get();
        return view('bookings.show',compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        return view('bookings.edit',compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $booking->update($request->all());

        return redirect()->route('bookings.index')
                        ->with('success','Booking updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index')
                        ->with('success','Booking deleted successfully');
    }

    public function isReturnYes($bid)
    {
        $booking=Booking::find($bid);
        $booking->is_return='yes';
        $booking->save();
        // dd($booking);

        return redirect()->back();
    }

    public function isReturnNo($bid)
    {
        // dd($vid);
        $booking=Booking::find($bid);
        // dd($booking);
        $booking->is_return='no';
        $booking->save();
        // dd($booking);

        return redirect()->back();
    }

}
