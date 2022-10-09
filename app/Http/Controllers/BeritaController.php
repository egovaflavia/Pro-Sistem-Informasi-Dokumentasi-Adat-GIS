<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Berita::with('user')->get();
        return view('backend.page.berita.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.page.berita.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'berita_judul'  => 'required',
            'berita_status' => 'required',
            'berita_isi'    => 'required',
            'berita_img'    => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ], [
            'required' => ':attribute harus di isi ',
            'mimes'    => ':attribute harus format jpeg/jpg/png/gif/svg',
            'image'    => ':attribute harus berupa gambar',
            'max'      => ':attribute Maksimal 2MB'
        ], [
            'berita_judul'  => 'Judul Berita',
            'berita_status' => 'Status Berita',
            'berita_isi'    => 'Isi berita',
            'berita_img'    => 'Gambar Berita',
        ]);

        # If Error
        if ($validator->fails()) {
            return redirect()->route('backend.berita.create')->withErrors($validator->errors())->withInput()->with('danger', 'Data gagal disimpan');
        }

        # Upload image
        $image = $request->file('berita_img');
        $image->storeAs('public/berita', $image->hashName());

        # Create data post
        Berita::create([
            'berita_judul'  => $request->berita_judul,
            'berita_status' => $request->berita_status,
            'berita_isi'    => $request->berita_isi,
            'berita_img'    => $image->hashName(),
            'user_id'       => auth()->user()->id,
        ]);

        return redirect()->route('backend.berita.index')->with('success', 'Data disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Berita::where('berita_id', $id)->first();
        return view('backend.page.berita.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'berita_judul'  => 'required',
            'berita_status' => 'required',
            'berita_isi'    => 'required',
            'berita_img'    => 'image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ], [
            'required' => ':attribute harus di isi ',
            'mimes'    => ':attribute harus format jpeg/jpg/png/gif/svg',
            'image'    => ':attribute harus berupa gambar',
            'max'      => ':attribute Maksimal 2MB'
        ], [
            'berita_judul'  => 'Judul Berita',
            'berita_status' => 'Status Berita',
            'berita_isi'    => 'Isi berita',
            'berita_img'    => 'Gambar Berita',
        ]);

        # Error
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $row = Berita::where('berita_id', $request->berita_id)->first();

        # check image not empty
        if ($request->hasFile('berita_img')) {
            # Upload image
            $image = $request->file('berita_img');
            $image->storeAs('public/berita', $image->hashName());

            # Delete old image
            Storage::delete(
                'public/berita/' . $row->berita_img
            );

            # Update with new image
            Berita::where('berita_id', $request->berita_id)
                ->update([
                    'berita_judul'  => $request->berita_judul,
                    'berita_status' => $request->berita_status,
                    'berita_isi'    => $request->berita_isi,
                    'berita_img'    => $image->hashName(),
                    'user_id'       => auth()->user()->id,
                ]);
        } else {
            # Update w/o image
            Berita::where('berita_id', $request->berita_id)
                ->update([
                    'berita_judul'  => $request->berita_judul,
                    'berita_status' => $request->berita_status,
                    'berita_isi'    => $request->berita_isi,
                    'user_id'       => auth()->user()->id,
                ]);
        }

        return redirect()->route('backend.berita.index')->with('success', 'Data diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Berita::where('berita_id', $id)->first();

        Storage::delete(
            'public/berita/' . $row->berita_img
        );

        Berita::where('berita_id', $id)->delete();
        return redirect()->route('backend.berita.index')->with('success', 'Data dihapus');
    }
}
