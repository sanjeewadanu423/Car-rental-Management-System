<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Cat;
use Illuminate\Http\Request;

class TypeController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::latest()->paginate(5);


        foreach($types as $type){

            $category[]=Type::find($type->id)->cat;
        }


        return view('types.index',compact('types','category'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('types.create');
        $categorys = Cat::get();

        return view('types.create', compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request);
        request()->validate([
            'vehicle_type_name' => 'required',
            'vehicle_cat_id' => 'required',
            'vehicle_cat_name' => 'required'

        ]);

        Type::create($request->all());

        return redirect()->route('types')
                        ->with('success','Type created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        $categorys = Cat::get();
        return view('types.show',compact('type' , 'categorys'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        $categorys = Cat::get();
        // dd($type);
        return view('types.edit',compact('categorys','type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        request()->validate([
            'vehicle_type_name' => 'required',
            'vehicle_cat_id' => 'required'
        ]);

        $type->update($request->all());

        return redirect()->route('types')
                        ->with('success','Type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route('types')
                        ->with('success','Type deleted successfully');
    }
}
