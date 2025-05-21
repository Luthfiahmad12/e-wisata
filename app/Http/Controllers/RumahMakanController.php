<?php

namespace App\Http\Controllers;

use App\Models\RumahMakan;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use App\Http\Requests\RumahMakanRequest;

class RumahMakanController extends Controller
{
    public function index()
    {
        return view('rumah_makan.index', [
            'rumahMakan' => RumahMakan::with('details.fasilitas')->get()
        ]);
    }

    public function create()
    {
        return view('rumah_makan.create', ['fasilitas' => Fasilitas::all()]);
    }

    public function store(RumahMakanRequest $request)
    {
        $validatedData = $request->validated();

        $rumahMakan = RumahMakan::create([
            'name' => $validatedData['name'],
            'desc' => $validatedData['desc'],
        ]);

        foreach ($validatedData['fasilitas'] as $fasilitasId) {
            $rumahMakan->details()->create([
                'fasilitas_id' => $fasilitasId
            ]);
        }

        return to_route('rumah_makan.index')->with('success', 'Berhasil tambah data');
    }

    public function edit(RumahMakan $rumahMakan)
    {
        return view('rumah_makan.edit', [
            'fasilitas' => Fasilitas::all(),
            'rumahMakan' => $rumahMakan,
            'selectedFasilitasIds' => $rumahMakan->details->pluck('fasilitas_id')->toArray()
        ]);
    }

    public function update(RumahMakanRequest $request, RumahMakan $rumahMakan)
    {
        $validatedData = $request->validated();

        $rumahMakan->update([
            'name' => $validatedData['name'],
            'desc' => $validatedData['desc'],
        ]);

        $rumahMakan->details()->delete();

        foreach ($validatedData['fasilitas'] as $fasilitasId) {
            $rumahMakan->details()->create([
                'fasilitas_id' => $fasilitasId
            ]);
        }

        return to_route('rumah_makan.index')->with('success', 'Berhasil update data');
    }

    public function destroy(RumahMakan $rumahMakan)
    {
        $rumahMakan->details()->delete();
        $rumahMakan->delete();

        return back()->with('warning', 'Data berhasil dihapus');
    }
}
