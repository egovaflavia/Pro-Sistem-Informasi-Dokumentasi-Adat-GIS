<?php

namespace App\Http\Controllers;

use App\Models\Pepatah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PepatahController extends Controller
{
    public function index()
    {
        $data = Pepatah::with('user')->get();
        return view('backend.page.pepatah.index', [
            'data' => $data
        ]);
    }

    public function gis()
    {
        $data = Pepatah::all();
        return response()->json($data);
    }

    public function create()
    {
        return view('backend.page.pepatah.tambah');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pepatah_petitih'  => 'required',
            'pepatah_terjemah' => 'required',
        ], [
            'required' => ':attribute harus di isi ',
        ], [
            'pepatah_petitih'  => 'Pepatah',
            'pepatah_terjemah' => 'Terjemah',
        ]);

        # If Error
        if ($validator->fails()) {
            return redirect()->route('backend.pepatah.create')->withErrors($validator->errors())->withInput()->with('danger', 'Data gagal disimpan');
        }

        # Create data post
        Pepatah::create([
            'pepatah_petitih'  => $request->pepatah_petitih,
            'pepatah_terjemah' => $request->pepatah_terjemah,
            'user_id'          => auth()->user()->id,
        ]);

        return redirect()->route('backend.pepatah.index')->with('success', 'Data disimpan');
    }

    public function edit($id)
    {
        $row = Pepatah::where('pepatah_id', $id)->first();
        return view('backend.page.pepatah.edit', compact('row'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pepatah_petitih'  => 'required',
            'pepatah_terjemah' => 'required',
        ], [
            'required' => ':attribute harus di isi ',
        ], [
            'pepatah_petitih'  => 'Pepatah',
            'pepatah_terjemah' => 'Terjemah',
        ]);

        Pepatah::where('pepatah_id', $request->pepatah_id)
            ->update([
                'pepatah_petitih'     => $request->pepatah_petitih,
                'pepatah_terjemah' => $request->pepatah_terjemah,
                'user_id'          => auth()->user()->id,
            ]);

        return redirect()->route('backend.pepatah.index')->with('success', 'Data diupdate');
    }

    public function destroy($id)
    {
        Pepatah::where('pepatah_id', $id)->delete();
        return redirect()->route('backend.pepatah.index')->with('success', 'Data dihapus');
    }
}
