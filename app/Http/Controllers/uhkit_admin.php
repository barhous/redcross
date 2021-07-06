<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\uh_kits;

class uhkit_admin extends Controller
{
    
    //Display a listing of the resource. 
    public function index() 
    { 
        return view('uh_kit.index')->with('uh_kit',uh_kits::all());
    }

    //Show the form for creating a new resource.
    public function create()
    {
        $uh_kit = new uh_kits();

        return view('uh_kit.create')->with(compact('uh_kit'));
    }

    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        uh_kits::create($request->all());

        return redirect(route('uh_kit-index'))->with('message','uhKit successfully created.');
    }

    //Display the specified resource.
    public function show(uh_kits $uh_kit)
    {
        // In an admin panel, I usually don't need this method. It's often more efficient to
        // show the customer data in the edit view.
    }

    //Show the form for editing the specified resource.
    public function edit(uh_kits $uh_kit)
    {
        return view('uh_kit.edit')->with(compact('uh_kit'));
    }

    //Update the specified resource in storage.
    public function update(Request $request,uh_kits $uh_kit)
    {
        $uh_kit->update($request->all());

        return redirect(route('uh_kit-index'))->with('message','uh_kit successfully updated.');
    }

    //Remove the specified resource from storage.
    public function destroy(uh_kits $uh_kit)
    {
        $uh_kit->delete();

        return redirect(route('uh_kit-index'))->with('message','uh_kit successfully removed.');
    }
}
