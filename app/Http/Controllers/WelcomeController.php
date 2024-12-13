<?php

namespace App\Http\Controllers;

use App\Models\Undangan;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $data = Undangan::where('keterangan', '!=', NULL)->get();
        return view('welcome', compact('data'));
    }

    public function kode($id)
    {
        $undangan = Undangan::where('kode', $id)->first();
        if (!$undangan) {
            return redirect('/');
        } else {
            $data = Undangan::where('keterangan', '!=', NULL)->orderBy('updated_at', 'DESC')->get();
            return view('v_tamu', compact('data','undangan'));
        }
    }

    public function update(Request $request, $id)
    {
        $undangan = Undangan::find($id)->update([
            'komentar' => $request->komentar,
            'keterangan' => $request->keterangan
        ]);
        return redirect()->back();
    }
}
