<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CregisterController extends Controller
{
    public function store(Request $request)
    {
        //  dd($request);
        request()->validate([
            'name'=> 'required',
            'email'=> 'required',
            'customer_phone'=> 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // customer::create($request->all());

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        $customer = new Customer;
        $customer->customer_address = $request->customer_address;
        $customer->customer_job = $request->customer_job;
        $customer->customer_phone = $request->customer_phone;
        $customer->customer_nic = $request->customer_nic;
        $customer->customer_photo = $request->customer_photo;

        if($request->hasFile('file')) {
            $imageName = time().'.'.$request->file->extension();

            $request->file->move(public_path('img'), $imageName);

            $customer->customer_photo = $imageName;



            }

        $user->customer()->save($customer);

        $user->assignRole('customer');

        return redirect()->back()
                        ->with('success','customer created successfully.');
    }
}
