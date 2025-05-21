<?php

namespace App\Http\Controllers;

use App\Models\RumahMakan;
use Illuminate\Http\Request;

class RumahMakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('rumah_makan.index', [
            'rumah_makan' => RumahMakan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RumahMakan $rumahMakan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RumahMakan $rumahMakan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RumahMakan $rumahMakan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RumahMakan $rumahMakan)
    {
        //
    }
}
