<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $i = 1;
        $bukus = buku::latest()->paginate(10);
        return view('Admin.Pages.Buku.index', compact('bukus', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Pages.Buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate form
        $request->validate([
            'cover_buku'         => 'required|image|mimes:jpeg,jpg,png|max:10000',
            'nama_penulis'         => 'required',
            'tahun_terbit'   => 'required',
            'judul'   => 'required',
            'jml_hal'   => 'required',
            'nisbn'   => 'required'
        ]);

        // dd($request);
        //upload image
        $cover_buku = $request->file('cover_buku');
        $cover_buku->storeAs('public/cover_buku', $cover_buku->hashName());

        //create product
        buku::create([
            'cover_buku'         => $cover_buku->hashName(),
            'nama_penulis'         => $request->nama_penulis,
            'tahun_terbit'         => $request->tahun_terbit,
            'kategori'         => $request->kategori,
            'judul'   => $request->judul,
            'deskripsi'   => $request->deskripsi,
            'penerbit'   => $request->penerbit,
            'kota'   => $request->kota,
            'jml_hal'   => $request->jml_hal,
            'nisbn'   => $request->nisbn
        ]);

        //redirect to index
        return redirect()->route('buku.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buku = buku::findOrFail($id);
        return view('Admin.Pages.Buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'nama_penulis'         => 'required',
            'tahun_terbit'   => 'required',
            'judul'   => 'required',
            'jml_hal'   => 'required',
            'nisbn'   => 'required'
        ]);
        // dd($request);
        $buku = buku::findOrFail($id);

        if ($request->hasFile('cover_buku')) {

            //upload new image
            $cover_buku = $request->file('cover_buku');
            $cover_buku->storeAs('public/cover_buku', $cover_buku->hashName());

            //delete old image
            Storage::delete('public/cover_buku/' . $buku->cover_buku);

            //update product with new image
            $buku->update([
                'cover_buku'         => $cover_buku->hashName(),
                'nama_penulis'         => $request->nama_penulis,
                'tahun_terbit'         => $request->tahun_terbit,
                'kategori'         => $request->kategori,
                'judul'   => $request->judul,
                'deskripsi'   => $request->deskripsi,
                'penerbit'   => $request->penerbit,
                'kota'   => $request->kota,
                'jml_hal'   => $request->jml_hal,
                'nisbn'   => $request->nisbn
            ]);
        } else {

            //update product without image
            $buku->update([
                'nama_penulis'         => $request->nama_penulis,
                'tahun_terbit'         => $request->tahun_terbit,
                'kategori'         => $request->kategori,
                'judul'   => $request->judul,
                'deskripsi'   => $request->deskripsi,
                'penerbit'   => $request->penerbit,
                'kota'   => $request->kota,
                'jml_hal'   => $request->jml_hal,
                'nisbn'   => $request->nisbn
            ]);
        }

        //redirect to index
        return redirect()->route('buku.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //get product by ID
        $buku = buku::findOrFail($id);

        //delete image
        Storage::delete('public/cover_buku/' . $buku->cover_buku);

        //delete buku
        $buku->delete();

        //redirect to index
        return redirect()->route('buku.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function download_buku(string $id)
    {
        $buku = buku::findOrFail($id);
        $myfile = storage_path("/app/public/cover_buku/" . $buku->cover_buku);
        $download_name = 'Cover buku ' . $buku->judul . '.png';
        return response()->download($myfile, $download_name);
    }
}
