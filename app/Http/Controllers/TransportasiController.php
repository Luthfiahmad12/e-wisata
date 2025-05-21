<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransportasiRequest;
use App\Models\Fasilitas;
use App\Models\Transportasi;
use Illuminate\Http\Request;

class TransportasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('transportasi.index', [
            'transportasi' => Transportasi::with('details')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transportasi.create', [
            'fasilitas' => Fasilitas::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransportasiRequest $request)
    {
        $validatedData = $request->validated();

        $wisata = Transportasi::create([
            'name' => $validatedData['name'],
            'desc' => $validatedData['desc'],
        ]);

        foreach ($validatedData['fasilitas'] as $fasilitasId) {
            $wisata->details()->create([
                'fasilitas_id' => $fasilitasId
            ]);
        }

        return to_route('transportasi.index')->with('success', 'berhasil tambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transportasi $transportasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transportasi $transportasi)
    {
        return view('transportasi.edit', [
            'fasilitas' => Fasilitas::all(),
            'transportasi' => $transportasi,
            'selectedFasilitasIds' => $transportasi->details->pluck('fasilitas_id')->toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransportasiRequest $request, Transportasi $transportasi)
    {
        $validatedData = $request->validated();
        $transportasi->update([
            'name' => $validatedData['name'],
            'desc' => $validatedData['desc'],
        ]);

        $transportasi->details()->delete();

        foreach ($validatedData['fasilitas'] as $fasilitasId) {
            $transportasi->details()->create([
                'fasilitas_id' => $fasilitasId
            ]);
        }

        return to_route('transportasi.index')->with('success', 'berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transportasi $transportasi)
    {
        if ($transportasi->details) {
            $transportasi->details()->delete();
        }

        $transportasi->delete();

        return back()->with('warning', 'data berhasil dihapus');
    }
}
