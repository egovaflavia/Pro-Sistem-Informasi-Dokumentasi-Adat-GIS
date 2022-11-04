<?php

namespace App\Http\Controllers;

use App\Models\Perhelatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PerhelatanController extends Controller
{
    public function index()
    {
        $data = Perhelatan::with('user')->get();
        return view('backend.page.perhelatan.index', [
            'data' => $data
        ]);
    }

    public function gis()
    {
        $data = Perhelatan::all();
        return response()->json($data);
    }

    public function create()
    {
        return view('backend.page.perhelatan.tambah');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'perhelatan_nama' => 'required',
            'perhelatan_lat'  => 'required',
            'perhelatan_long' => 'required',
            'perhelatan_ket'  => 'required',
            'perhelatan_img'  => 'required|image|mimes:jpeg,jpg,png,gif,svg',
        ], [
            'required' => ':attribute harus di isi ',
            'mimes'    => ':attribute harus format jpeg/jpg/png/gif/svg',
            'image'    => ':attribute harus berupa gambar',
            'max'      => ':attribute Maksimal 2MB'
        ], [
            'perhelatan_nama' => 'Nama Makanan',
            'perhelatan_lat'  => 'Latitude',
            'perhelatan_long' => 'Longtitude',
            'perhelatan_ket'  => 'Keterangan',
            'perhelatan_img'  => 'Gambar'
        ]);

        # If Error
        if ($validator->fails()) {
            return redirect()->route('backend.perhelatan.create')->withErrors($validator->errors())->withInput()->with('danger', 'Data gagal disimpan');
        }

        # Upload image
        $image = $request->file('perhelatan_img');
        $image->storeAs('public/perhelatan', $image->hashName());

        # Create data post
        Perhelatan::create([
            'perhelatan_nama' => $request->perhelatan_nama,
            'perhelatan_lat'  => $request->perhelatan_lat,
            'perhelatan_long' => $request->perhelatan_long,
            'perhelatan_ket'  => $request->perhelatan_ket,
            'perhelatan_img'  => $image->hashName(),
            'user_id'      => auth()->user()->id,
        ]);

        return redirect()->route('backend.perhelatan.index')->with('success', 'Data disimpan');
    }

    public function edit($id)
    {
        $row = Perhelatan::where('perhelatan_id', $id)->first();
        return view('backend.page.perhelatan.edit', compact('row'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'perhelatan_nama' => 'required',
            'perhelatan_lat'  => 'required',
            'perhelatan_long' => 'required',
            'perhelatan_ket'  => 'required',
            'perhelatan_img'  => 'image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ], [
            'required' => ':attribute harus di isi ',
            'mimes'    => ':attribute harus format jpeg/jpg/png/gif/svg',
            'image'    => ':attribute harus berupa gambar',
            'max'      => ':attribute Maksimal 2MB'
        ], [
            'perhelatan_nama' => 'Nama Makanan',
            'perhelatan_lat'  => 'Latitude',
            'perhelatan_long' => 'Longtitude',
            'perhelatan_ket'  => 'Keterangan',
            'perhelatan_img'  => 'Gambar'
        ]);

        # If Error
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput()->with('danger', 'Data gagal disimpan');
        }

        $row = Perhelatan::where('perhelatan_id', $request->perhelatan_id)->first();

        # check image not empty
        if ($request->hasFile('perhelatan_img')) {
            # Upload image
            $image = $request->file('perhelatan_img');
            $image->storeAs('public/perhelatan', $image->hashName());

            # Delete old image
            Storage::delete(
                'public/perhelatan/' . $row->perhelatan_img
            );

            # Update with new image
            Perhelatan::where('perhelatan_id', $request->perhelatan_id)
                ->update([
                    'perhelatan_nama' => $request->perhelatan_nama,
                    'perhelatan_lat'  => $request->perhelatan_lat,
                    'perhelatan_long' => $request->perhelatan_long,
                    'perhelatan_ket'  => $request->perhelatan_ket,
                    'perhelatan_img'  => $image->hashName(),
                    'user_id'      => auth()->user()->id,
                ]);
        } else {
            # Update w/o image
            Perhelatan::where('perhelatan_id', $request->perhelatan_id)
                ->update([
                    'perhelatan_nama' => $request->perhelatan_nama,
                    'perhelatan_lat'  => $request->perhelatan_lat,
                    'perhelatan_long' => $request->perhelatan_long,
                    'perhelatan_ket'  => $request->perhelatan_ket,
                    'user_id'      => auth()->user()->id,
                ]);
        }

        return redirect()->route('backend.perhelatan.index')->with('success', 'Data diupdate');
    }

    public function destroy($id)
    {
        $row = Perhelatan::where('perhelatan_id', $id)->first();

        Storage::delete(
            'public/perhelatan/' . $row->perhelatan_img
        );

        Perhelatan::where('perhelatan_id', $id)->delete();
        return redirect()->route('backend.perhelatan.index')->with('success', 'Data dihapus');
    }
}
