<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:customer-list|customer-create|customer-edit|customer-delete', ['only' => ['index','show']]);
         $this->middleware('permission:customer-create', ['only' => ['create','store']]);
         $this->middleware('permission:customer-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:customer-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $customers = Customer::latest()->paginate(5);

        // foreach($customers as $customer){
        //     $user[]=Customer::find($customer->id)->user;
        //  }

        $customers = DB::table('users')
            ->join('customers', 'users.id', '=', 'customers.user_id')
            ->select('users.*', 'customers.*')
            ->paginate(5);

        return view('customers.index',compact('customers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
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
            'name' => 'required',
            'email' => 'required|email',
            'nic' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'job' => 'required',
            'photo' => 'required|image',
        ]);

        customer::create($request->all());

        return redirect()->route('customers.index')
                        ->with('success','customer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $user = User::get();
        return view('customers.show',compact('customer','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        request()->validate([

            'customer_nic' => 'required',
            'customer_phone' => 'required',
            'customer_address' => 'required',
            'customer_job' => 'required',

        ]);

        $customer->update($request->all());

        return redirect()->route('customers')
                        ->with('success','customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')
                        ->with('success','customer deleted successfully');
    }

    public function showProfile($customerid)
    {
        // dd($customerid);
        $customers = DB::table('users')
            ->join('customers', 'users.id', '=', 'customers.user_id')
            ->where('customers.id', '=' , $customerid)
            ->select('users.*', 'customers.*')
            ->get();

// dd($customers);

        // $user = User::get();

        // dd($user);
        return view('customers.show',compact('customers'));
    }
}
