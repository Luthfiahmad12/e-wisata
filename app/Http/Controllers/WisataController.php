<?php

namespace App\Http\Controllers;

use App\Http\Requests\WisataRequest;
use App\Models\Fasilitas;
use App\Models\Wisata;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('wisata.index', ['wisata' => Wisata::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wisata.create', ['fasilitas' => Fasilitas::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WisataRequest $request)
    {
        $validatedData = $request->validated();

        $wisata = Wisata::create([
            'name' => $validatedData['name'],
            'desc' => $validatedData['desc'],
        ]);

        foreach ($validatedData['fasilitas'] as $fasilitasId) {
            $wisata->details()->create([
                'fasilitas_id' => $fasilitasId
            ]);
        }

        return to_route('wisata.index')->with('success', 'berhasil tambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wisata $wisata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wisata $wisata)
    {
        return view('wisata.edit', [
            'fasilitas' => Fasilitas::all(),
            'wisata' => $wisata,
            'selectedFasilitasIds' => $wisata->details->pluck('fasilitas_id')->toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WisataRequest $request, Wisata $wisata)
    {
        $validatedData = $request->validated();
        $wisata->update([
            'name' => $validatedData['name'],
            'desc' => $validatedData['desc'],
        ]);

        $wisata->details()->delete();

        foreach ($validatedData['fasilitas'] as $fasilitasId) {
            $wisata->details()->create([
                'fasilitas_id' => $fasilitasId
            ]);
        }

        return to_route('wisata.index')->with('success', 'berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wisata $wisata)
    {
        if ($wisata->details) {
            $wisata->details()->delete();
        }

        $wisata->delete();

        return back()->with('warning', 'data berhasil dihapus');
    }
}
