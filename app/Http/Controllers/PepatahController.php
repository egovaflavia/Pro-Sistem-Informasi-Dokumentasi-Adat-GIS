<?php

namespace App\Http\Controllers;

use App\Models\Pepatah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'pepatah_nama' => 'required',
            'pepatah_lat'  => 'required',
            'pepatah_long' => 'required',
            'pepatah_ket'  => 'required',
            'pepatah_img'  => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ], [
            'required' => ':attribute harus di isi ',
            'mimes'    => ':attribute harus format jpeg/jpg/png/gif/svg',
            'image'    => ':attribute harus berupa gambar',
            'max'      => ':attribute Maksimal 2MB'
        ], [
            'pepatah_nama' => 'Nama Makanan',
            'pepatah_lat'  => 'Latitude',
            'pepatah_long' => 'Longtitude',
            'pepatah_ket'  => 'Keterangan',
            'pepatah_img'  => 'Gambar'
        ]);

        # If Error
        if ($validator->fails()) {
            return redirect()->route('backend.pepatah.create')->withErrors($validator->errors())->withInput()->with('danger', 'Data gagal disimpan');
        }

        # Upload image
        $image = $request->file('pepatah_img');
        $image->storeAs('public/pepatah', $image->hashName());

        # Create data post
        Pepatah::create([
            'pepatah_nama' => $request->pepatah_nama,
            'pepatah_lat'  => $request->pepatah_lat,
            'pepatah_long' => $request->pepatah_long,
            'pepatah_ket'  => $request->pepatah_ket,
            'pepatah_img'  => $image->hashName(),
            'user_id'      => auth()->user()->id,
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
            'pepatah_nama' => 'required',
            'pepatah_lat'  => 'required',
            'pepatah_long' => 'required',
            'pepatah_ket'  => 'required',
            'pepatah_img'  => 'image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ], [
            'required' => ':attribute harus di isi ',
            'mimes'    => ':attribute harus format jpeg/jpg/png/gif/svg',
            'image'    => ':attribute harus berupa gambar',
            'max'      => ':attribute Maksimal 2MB'
        ], [
            'pepatah_nama' => 'Nama Makanan',
            'pepatah_lat'  => 'Latitude',
            'pepatah_long' => 'Longtitude',
            'pepatah_ket'  => 'Keterangan',
            'pepatah_img'  => 'Gambar'
        ]);

        # If Error
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput()->with('danger', 'Data gagal disimpan');
        }

        $row = Pepatah::where('pepatah_id', $request->pepatah_id)->first();

        # check image not empty
        if ($request->hasFile('pepatah_img')) {
            # Upload image
            $image = $request->file('pepatah_img');
            $image->storeAs('public/pepatah', $image->hashName());

            # Delete old image
            Storage::delete(
                'public/pepatah/' . $row->pepatah_img
            );

            # Update with new image
            Pepatah::where('pepatah_id', $request->pepatah_id)
                ->update([
                    'pepatah_nama' => $request->pepatah_nama,
                    'pepatah_lat'  => $request->pepatah_lat,
                    'pepatah_long' => $request->pepatah_long,
                    'pepatah_ket'  => $request->pepatah_ket,
                    'pepatah_img'  => $image->hashName(),
                    'user_id'      => auth()->user()->id,
                ]);
        } else {
            # Update w/o image
            Pepatah::where('pepatah_id', $request->pepatah_id)
                ->update([
                    'pepatah_nama' => $request->pepatah_nama,
                    'pepatah_lat'  => $request->pepatah_lat,
                    'pepatah_long' => $request->pepatah_long,
                    'pepatah_ket'  => $request->pepatah_ket,
                    'user_id'      => auth()->user()->id,
                ]);
        }

        return redirect()->route('backend.pepatah.index')->with('success', 'Data diupdate');
    }

    public function destroy($id)
    {
        $row = Pepatah::where('pepatah_id', $id)->first();

        Storage::delete(
            'public/pepatah/' . $row->pepatah_img
        );

        Pepatah::where('pepatah_id', $id)->delete();
        return redirect()->route('backend.pepatah.index')->with('success', 'Data dihapus');
    }
}
