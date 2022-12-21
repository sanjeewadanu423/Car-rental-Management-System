<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::latest()->paginate(5);
        return view('offers.index',compact('offers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offers.create');
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
            'title' => 'required',
            'offer_descrip' => 'required',
            'coupon' => 'required',
            'offer_price' => 'required',

        ]);

        $offer = new Offer;


        $offer->offer_photo = $request->offer_photo ;
        $offer->title = $request->title;
        $offer->offer_descrip = $request->offer_descrip;
        $offer->coupon = $request->coupon;
        $offer->offer_price = $request->offer_price;


        // dd($offer);
        if($request->hasFile('file')) {
            $imageName = time().'.'.$request->file->extension();

            $request->file->move(public_path('img'), $imageName);

            $offer->offer_photo = $imageName;

            }

            // dd($offer);


            // Vehicle::create($request->all());

            $offer->save();

        // Offer::create($request->all());

        return redirect()->route('offers')
                        ->with('success','offer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        $admin = Admin::get();
        return view('offers.show',compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        return view('offers.edit',compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        request()->validate([
            'title' => 'required',
            'offer_descrip' => 'required',
            'coupon' => 'required',
            'offer_price' => 'required',

        ]);

        // $offer->update($request->all());

        $offer = new Offer;


        $offer->offer_photo = $request->offer_photo ;
        $offer->title = $request->title;
        $offer->offer_descrip = $request->offer_descrip;
        $offer->coupon = $request->coupon;
        $offer->offer_price = $request->offer_price;


        // dd($offer);
        if($request->hasFile('file')) {
            $imageName = time().'.'.$request->file->extension();

            $request->file->move(public_path('img'), $imageName);

            $offer->Offer_photo = $imageName;

            }


            // Vehicle::create($request->all());

            $offer->save();

        return redirect()->route('offers')
                        ->with('success','offer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        $offer->delete();

        return redirect()->route('offers')
                        ->with('success','offer deleted successfully');
    }
}
