<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MakananController extends Controller
{

    public function index()
    {
        $data = Makanan::with('user')->get();
        return view('backend.page.makanan.index', [
            'data' => $data
        ]);
    }

    public function gis()
    {
        $data = Makanan::all();
        return response()->json($data);
    }

    public function create()
    {
        return view('backend.page.makanan.tambah');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'makanan_nama' => 'required',
            'makanan_lat'  => 'required',
            'makanan_long' => 'required',
            'makanan_ket'  => 'required',
            'makanan_img'  => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ], [
            'required' => ':attribute harus di isi ',
            'mimes'    => ':attribute harus format jpeg/jpg/png/gif/svg',
            'image'    => ':attribute harus berupa gambar',
            'max'      => ':attribute Maksimal 2MB'
        ], [
            'makanan_nama' => 'Nama Makanan',
            'makanan_lat'  => 'Latitude',
            'makanan_long' => 'Longtitude',
            'makanan_ket'  => 'Keterangan',
            'makanan_img'  => 'Gambar'
        ]);

        # If Error
        if ($validator->fails()) {
            return redirect()->route('backend.makanan.create')->withErrors($validator->errors())->withInput()->with('danger', 'Data gagal disimpan');
        }

        # Upload image
        $image = $request->file('makanan_img');
        $image->storeAs('public/makanan', $image->hashName());

        # Create data post
        Makanan::create([
            'makanan_nama' => $request->makanan_nama,
            'makanan_lat'  => $request->makanan_lat,
            'makanan_long' => $request->makanan_long,
            'makanan_ket'  => $request->makanan_ket,
            'makanan_img'  => $image->hashName(),
            'user_id'      => auth()->user()->id,
        ]);

        return redirect()->route('backend.makanan.index')->with('success', 'Data disimpan');
    }

    public function edit($id)
    {
        $row = Makanan::where('makanan_id', $id)->first();
        return view('backend.page.makanan.edit', compact('row'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'makanan_nama' => 'required',
            'makanan_lat'  => 'required',
            'makanan_long' => 'required',
            'makanan_ket'  => 'required',
            'makanan_img'  => 'image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ], [
            'required' => ':attribute harus di isi ',
            'mimes'    => ':attribute harus format jpeg/jpg/png/gif/svg',
            'image'    => ':attribute harus berupa gambar',
            'max'      => ':attribute Maksimal 2MB'
        ], [
            'makanan_nama' => 'Nama Makanan',
            'makanan_lat'  => 'Latitude',
            'makanan_long' => 'Longtitude',
            'makanan_ket'  => 'Keterangan',
            'makanan_img'  => 'Gambar'
        ]);

        # If Error
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput()->with('danger', 'Data gagal disimpan');
        }

        $row = Makanan::where('makanan_id', $request->makanan_id)->first();

        # check image not empty
        if ($request->hasFile('makanan_img')) {
            # Upload image
            $image = $request->file('makanan_img');
            $image->storeAs('public/makanan', $image->hashName());

            # Delete old image
            Storage::delete(
                'public/makanan/' . $row->makanan_img
            );

            # Update with new image
            Makanan::where('makanan_id', $request->makanan_id)
                ->update([
                    'makanan_nama' => $request->makanan_nama,
                    'makanan_lat'  => $request->makanan_lat,
                    'makanan_long' => $request->makanan_long,
                    'makanan_ket'  => $request->makanan_ket,
                    'makanan_img'  => $image->hashName(),
                    'user_id'      => auth()->user()->id,
                ]);
        } else {
            # Update w/o image
            Makanan::where('makanan_id', $request->makanan_id)
                ->update([
                    'makanan_nama' => $request->makanan_nama,
                    'makanan_lat'  => $request->makanan_lat,
                    'makanan_long' => $request->makanan_long,
                    'makanan_ket'  => $request->makanan_ket,
                    'user_id'      => auth()->user()->id,
                ]);
        }

        return redirect()->route('backend.makanan.index')->with('success', 'Data diupdate');
    }

    public function destroy($id)
    {
        $row = Makanan::where('makanan_id', $id)->first();

        Storage::delete(
            'public/makanan/' . $row->makanan_img
        );

        Makanan::where('makanan_id', $id)->delete();
        return redirect()->route('backend.makanan.index')->with('success', 'Data dihapus');
    }
}
