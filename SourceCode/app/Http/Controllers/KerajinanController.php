<?php

namespace App\Http\Controllers;

use App\Models\Kerajinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class KerajinanController extends Controller
{
    public function index()
    {
        $data = Kerajinan::with('user')->get();
        return view('backend.page.kerajinan.index', [
            'data' => $data
        ]);
    }

    public function gis()
    {
        $data = Kerajinan::all();
        return response()->json($data);
    }

    public function create()
    {
        return view('backend.page.kerajinan.tambah');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kerajinan_nama' => 'required',
            'kerajinan_lat'  => 'required',
            'kerajinan_long' => 'required',
            'kerajinan_ket'  => 'required',
            'kerajinan_img'  => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ], [
            'required' => ':attribute harus di isi ',
            'mimes'    => ':attribute harus format jpeg/jpg/png/gif/svg',
            'image'    => ':attribute harus berupa gambar',
            'max'      => ':attribute Maksimal 2MB'
        ], [
            'kerajinan_nama' => 'Nama Makanan',
            'kerajinan_lat'  => 'Latitude',
            'kerajinan_long' => 'Longtitude',
            'kerajinan_ket'  => 'Keterangan',
            'kerajinan_img'  => 'Gambar'
        ]);

        # If Error
        if ($validator->fails()) {
            return redirect()->route('backend.kerajinan.create')->withErrors($validator->errors())->withInput()->with('danger', 'Data gagal disimpan');
        }

        # Upload image
        $image = $request->file('kerajinan_img');
        $image->storeAs('public/kerajinan', $image->hashName());

        # Create data post
        Kerajinan::create([
            'kerajinan_nama' => $request->kerajinan_nama,
            'kerajinan_lat'  => $request->kerajinan_lat,
            'kerajinan_long' => $request->kerajinan_long,
            'kerajinan_ket'  => $request->kerajinan_ket,
            'kerajinan_img'  => $image->hashName(),
            'user_id'      => auth()->user()->id,
        ]);

        return redirect()->route('backend.kerajinan.index')->with('success', 'Data disimpan');
    }

    public function edit($id)
    {
        $row = Kerajinan::where('kerajinan_id', $id)->first();
        return view('backend.page.kerajinan.edit', compact('row'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kerajinan_nama' => 'required',
            'kerajinan_lat'  => 'required',
            'kerajinan_long' => 'required',
            'kerajinan_ket'  => 'required',
            'kerajinan_img'  => 'image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ], [
            'required' => ':attribute harus di isi ',
            'mimes'    => ':attribute harus format jpeg/jpg/png/gif/svg',
            'image'    => ':attribute harus berupa gambar',
            'max'      => ':attribute Maksimal 2MB'
        ], [
            'kerajinan_nama' => 'Nama Makanan',
            'kerajinan_lat'  => 'Latitude',
            'kerajinan_long' => 'Longtitude',
            'kerajinan_ket'  => 'Keterangan',
            'kerajinan_img'  => 'Gambar'
        ]);

        # If Error
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput()->with('danger', 'Data gagal disimpan');
        }

        $row = Kerajinan::where('kerajinan_id', $request->kerajinan_id)->first();

        # check image not empty
        if ($request->hasFile('kerajinan_img')) {
            # Upload image
            $image = $request->file('kerajinan_img');
            $image->storeAs('public/kerajinan', $image->hashName());

            # Delete old image
            Storage::delete(
                'public/kerajinan/' . $row->kerajinan_img
            );

            # Update with new image
            Kerajinan::where('kerajinan_id', $request->kerajinan_id)
                ->update([
                    'kerajinan_nama' => $request->kerajinan_nama,
                    'kerajinan_lat'  => $request->kerajinan_lat,
                    'kerajinan_long' => $request->kerajinan_long,
                    'kerajinan_ket'  => $request->kerajinan_ket,
                    'kerajinan_img'  => $image->hashName(),
                    'user_id'      => auth()->user()->id,
                ]);
        } else {
            # Update w/o image
            Kerajinan::where('kerajinan_id', $request->kerajinan_id)
                ->update([
                    'kerajinan_nama' => $request->kerajinan_nama,
                    'kerajinan_lat'  => $request->kerajinan_lat,
                    'kerajinan_long' => $request->kerajinan_long,
                    'kerajinan_ket'  => $request->kerajinan_ket,
                    'user_id'      => auth()->user()->id,
                ]);
        }

        return redirect()->route('backend.kerajinan.index')->with('success', 'Data diupdate');
    }

    public function destroy($id)
    {
        $row = Kerajinan::where('kerajinan_id', $id)->first();

        Storage::delete(
            'public/kerajinan/' . $row->kerajinan_img
        );

        Kerajinan::where('kerajinan_id', $id)->delete();
        return redirect()->route('backend.kerajinan.index')->with('success', 'Data dihapus');
    }
}
