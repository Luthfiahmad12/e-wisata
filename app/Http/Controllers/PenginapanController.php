<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenginapanRequest;
use App\Models\Fasilitas;
use App\Models\Penginapan;
use Illuminate\Http\Request;

class PenginapanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('penginapan.index', [
            'penginapans' => Penginapan::with('details')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penginapan.create', [
            'fasilitas' => Fasilitas::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PenginapanRequest $request)
    {
        $validatedData = $request->validated();

        $wisata = Penginapan::create([
            'name' => $validatedData['name'],
            'desc' => $validatedData['desc'],
        ]);

        foreach ($validatedData['fasilitas'] as $fasilitasId) {
            $wisata->details()->create([
                'fasilitas_id' => $fasilitasId
            ]);
        }

        return to_route('penginapans.index')->with('success', 'berhasil tambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penginapan $penginapan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penginapan $penginapan)
    {
        return view('penginapan.edit', [
            'fasilitas' => Fasilitas::all(),
            'penginapan' => $penginapan,
            'selectedFasilitasIds' => $penginapan->details->pluck('fasilitas_id')->toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PenginapanRequest $request, Penginapan $penginapan)
    {
        $validatedData = $request->validated();
        $penginapan->update([
            'name' => $validatedData['name'],
            'desc' => $validatedData['desc'],
        ]);

        $penginapan->details()->delete();

        foreach ($validatedData['fasilitas'] as $fasilitasId) {
            $penginapan->details()->create([
                'fasilitas_id' => $fasilitasId
            ]);
        }

        return to_route('penginapans.index')->with('success', 'berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penginapan $penginapan)
    {
        if ($penginapan->details) {
            $penginapan->details()->delete();
        }

        $penginapan->delete();

        return back()->with('warning', 'data berhasil dihapus');
    }
}
