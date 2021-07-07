<?php

namespace App\Http\Controllers;

use App\Models\uh_kits;
use Illuminate\Http\Request;

class uhkit extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uhkits = uh_kits::latest()->paginate(5);

        return view('uhkit.index', compact('uhkits'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('uhkit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'descr' => 'required',
            
        ]);

        uh_kits::create($request->all());

        return redirect()->route('uhkit.index')
            ->with('success', 'uhkit created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(uh_kits $uhkit)
    {
        return view('uhkit.show', compact('uhkits'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(uh_kits $uhkit)
    {
        return view('uhkit.edit', compact('uhkits'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, uh_kits $uhkit)
    {
        $request->validate([
            'id' => 'required',
            'descr' => 'required',
        ]);
        $uhkit->update($request->all());

        return redirect()->route('uhkit.index')
            ->with('success', 'uhkit updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(uh_kits $uhkit)
    {
        $uhkit->delete();

        return redirect()->route('uhkit.index')
            ->with('success', 'uhkit deleted successfully');
    }
}
