<?php

namespace App\Http\Controllers;

use App\Models\penelitian;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PenelitianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $i = 1;
        $penelitians = penelitian::latest()->paginate(10);
        return view('Admin.Pages.Penelitian.index', compact('penelitians', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Pages.Penelitian.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'file_penelitian'         => 'required|mimes:pdf|max:10000',
            'nama'         => 'required|min:5',
            'judul'   => 'required|min:5',
        ]);

        //upload image
        $file_penelitian = $request->file('file_penelitian');
        $file_penelitian->storeAs('public/file_penelitian', $file_penelitian->hashName());

        //create product
        penelitian::create([
            'file_penelitian'         => $file_penelitian->hashName(),
            'nama'         => $request->nama,
            'judul'   => $request->judul,
        ]);

        //redirect to index
        return redirect()->route('penelitian.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $penelitian = penelitian::findOrFail($id);
        return view('Admin.Pages.Penelitian.edit', compact('penelitian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'file_penelitian' => 'required|mimes:pdf|max:10000',
            'nama' => 'required|min:5',
            'judul' => 'required|min:5'
        ]);

        $penelitian = penelitian::findOrFail($id);

        if ($request->hasFile('file_penelitian')) {

            //upload new image
            $file_penelitian = $request->file('file_penelitian');
            $file_penelitian->storeAs('public/file_penelitian', $file_penelitian->hashName());

            //delete old image
            Storage::delete('public/file_penelitian/' . $penelitian->file_penelitian);

            //update product with new image
            $penelitian->update([
                'file_penelitian'         => $file_penelitian->hashName(),
                'nama'         => $request->nama,
                'judul'   => $request->judul
            ]);
        } else {

            //update product without image
            $penelitian->update([
                'nama'         => $request->nama,
                'judul'   => $request->judul
            ]);
        }

        //redirect to index
        return redirect()->route('penelitian.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        //get product by ID
        $penelitian = penelitian::findOrFail($id);

        //delete image
        Storage::delete('public/file_penelitian/' . $penelitian->file_penelitian);

        //delete penelitian
        $penelitian->delete();

        //redirect to index
        return redirect()->route('penelitian.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function download()
    {
        $myfile = storage_path("/app/public/bakal.pdf");
        return response()->download($myfile);
    }

    public function download_penelitian(string $id)
    {
        $penelitian = penelitian::findOrFail($id);
        $myfile = storage_path("/app/public/file_penelitian/" . $penelitian->file_penelitian);
        $download_name = 'File Penelitian ' . $penelitian->nama . '.pdf';
        return response()->download($myfile, $download_name);
    }
}
