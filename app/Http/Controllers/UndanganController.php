<?php

namespace App\Http\Controllers;

use App\Imports\UndanganImport;
use App\Models\Undangan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UndanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $undangan = Undangan::all();
        return view('undangan.index', compact('undangan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('undangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $kode = substr(str_shuffle($permitted_chars), 0, 8);
        $undangan = Undangan::create(
            [
                'kode' => $kode,
                'nama' => $request->undangan,
                'whatsapp' => $request->whatsapp,
            ]
        );
        return redirect()->route('undangan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Undangan $undangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $undangan = Undangan::find($id);
        return view('undangan.edit', compact('undangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $undangan = Undangan::find($id);
        $undangan->update(
            [
                'nama' => $request->undangan,
                'whatsapp' => $request->whatsapp,
            ]
        );
        return redirect()->route('undangan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $undangan = Undangan::find($id);
        $undangan->delete();
        return redirect()->route('undangan.index');
    }

    public function import(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,ods',
        ]);

        // Import the data using the UndanganImport class
        Excel::import(new UndanganImport, $request->file('file'));

        // Redirect back with a success message
        return back()->with('success', 'Undangan data imported successfully!');
    }
}
