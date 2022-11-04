<?php

namespace App\Http\Controllers;

use App\Models\Kesenian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class KesenianController extends Controller
{
    public function index()
    {
        $data = Kesenian::with('user')->get();
        return view('backend.page.kesenian.index', [
            'data' => $data
        ]);
    }

    public function gis()
    {
        $data = Kesenian::all();
        return response()->json($data);
    }

    public function create()
    {
        return view('backend.page.kesenian.tambah');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kesenian_nama' => 'required',
            'kesenian_lat'  => 'required',
            'kesenian_long' => 'required',
            'kesenian_ket'  => 'required',
            'kesenian_img'  => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ], [
            'required' => ':attribute harus di isi ',
            'mimes'    => ':attribute harus format jpeg/jpg/png/gif/svg',
            'image'    => ':attribute harus berupa gambar',
            'max'      => ':attribute Maksimal 2MB'
        ], [
            'kesenian_nama' => 'Nama Makanan',
            'kesenian_lat'  => 'Latitude',
            'kesenian_long' => 'Longtitude',
            'kesenian_ket'  => 'Keterangan',
            'kesenian_img'  => 'Gambar'
        ]);

        # If Error
        if ($validator->fails()) {
            return redirect()->route('backend.kesenian.create')->withErrors($validator->errors())->withInput()->with('danger', 'Data gagal disimpan');
        }

        # Upload image
        $image = $request->file('kesenian_img');
        $image->storeAs('public/kesenian', $image->hashName());

        # Create data post
        Kesenian::create([
            'kesenian_nama' => $request->kesenian_nama,
            'kesenian_lat'  => $request->kesenian_lat,
            'kesenian_long' => $request->kesenian_long,
            'kesenian_ket'  => $request->kesenian_ket,
            'kesenian_img'  => $image->hashName(),
            'user_id'      => auth()->user()->id,
        ]);

        return redirect()->route('backend.kesenian.index')->with('success', 'Data disimpan');
    }

    public function edit($id)
    {
        $row = Kesenian::where('kesenian_id', $id)->first();
        return view('backend.page.kesenian.edit', compact('row'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kesenian_nama' => 'required',
            'kesenian_lat'  => 'required',
            'kesenian_long' => 'required',
            'kesenian_ket'  => 'required',
            'kesenian_img'  => 'image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ], [
            'required' => ':attribute harus di isi ',
            'mimes'    => ':attribute harus format jpeg/jpg/png/gif/svg',
            'image'    => ':attribute harus berupa gambar',
            'max'      => ':attribute Maksimal 2MB'
        ], [
            'kesenian_nama' => 'Nama Makanan',
            'kesenian_lat'  => 'Latitude',
            'kesenian_long' => 'Longtitude',
            'kesenian_ket'  => 'Keterangan',
            'kesenian_img'  => 'Gambar'
        ]);

        # If Error
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput()->with('danger', 'Data gagal disimpan');
        }

        $row = Kesenian::where('kesenian_id', $request->kesenian_id)->first();

        # check image not empty
        if ($request->hasFile('kesenian_img')) {
            # Upload image
            $image = $request->file('kesenian_img');
            $image->storeAs('public/kesenian', $image->hashName());

            # Delete old image
            Storage::delete(
                'public/kesenian/' . $row->kesenian_img
            );

            # Update with new image
            Kesenian::where('kesenian_id', $request->kesenian_id)
                ->update([
                    'kesenian_nama' => $request->kesenian_nama,
                    'kesenian_lat'  => $request->kesenian_lat,
                    'kesenian_long' => $request->kesenian_long,
                    'kesenian_ket'  => $request->kesenian_ket,
                    'kesenian_img'  => $image->hashName(),
                    'user_id'      => auth()->user()->id,
                ]);
        } else {
            # Update w/o image
            Kesenian::where('kesenian_id', $request->kesenian_id)
                ->update([
                    'kesenian_nama' => $request->kesenian_nama,
                    'kesenian_lat'  => $request->kesenian_lat,
                    'kesenian_long' => $request->kesenian_long,
                    'kesenian_ket'  => $request->kesenian_ket,
                    'user_id'      => auth()->user()->id,
                ]);
        }

        return redirect()->route('backend.kesenian.index')->with('success', 'Data diupdate');
    }

    public function destroy($id)
    {
        $row = Kesenian::where('kesenian_id', $id)->first();

        Storage::delete(
            'public/kesenian/' . $row->kesenian_img
        );

        Kesenian::where('kesenian_id', $id)->delete();
        return redirect()->route('backend.kesenian.index')->with('success', 'Data dihapus');
    }
}
