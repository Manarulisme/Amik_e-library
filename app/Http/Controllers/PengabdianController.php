<?php

namespace App\Http\Controllers;

use App\Models\pengabdian;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengabdianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $i = 1;
        $pengabdians = pengabdian::latest()->paginate(10);
        return view('Admin.Pages.Pengabdian.index', compact('pengabdians', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Pages.Pengabdian.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'file_pengabdian'         => 'required|mimes:pdf|max:10000',
            'tim'         => 'required|min:5',
            'judul'   => 'required|min:5',
        ]);

        //upload image
        $file_pengabdian = $request->file('file_pengabdian');
        $file_pengabdian->storeAs('public/file_pengabdian', $file_pengabdian->hashName());

        //create product
        pengabdian::create([
            'file_pengabdian'         => $file_pengabdian->hashName(),
            'tim'         => $request->tim,
            'judul'   => $request->judul,
        ]);

        //redirect to index
        return redirect()->route('pengabdian.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $pengabdian = pengabdian::findOrFail($id);
        return view('Admin.Pages.Pengabdian.edit', compact('pengabdian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'file_pengabdian' => 'required|mimes:pdf|max:10000',
            'tim' => 'required|min:5',
            'judul' => 'required|min:5'
        ]);

        $pengabdian = pengabdian::findOrFail($id);

        if ($request->hasFile('file_pengabdian')) {

            //upload new image
            $file_pengabdian = $request->file('file_pengabdian');
            $file_pengabdian->storeAs('public/file_pengabdian', $file_pengabdian->hashName());

            //delete old image
            Storage::delete('public/file_pengabdian/' . $pengabdian->file_pengabdian);

            //update product with new image
            $pengabdian->update([
                'file_pengabdian'         => $file_pengabdian->hashName(),
                'tim'         => $request->tim,
                'judul'   => $request->judul
            ]);
        } else {

            //update product without image
            $pengabdian->update([
                'tim'         => $request->tim,
                'judul'   => $request->judul
            ]);
        }

        //redirect to index
        return redirect()->route('pengabdian.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //get product by ID
        $pengabdian = pengabdian::findOrFail($id);

        //delete image
        Storage::delete('public/file_pengabdian/' . $pengabdian->file_pengabdian);

        //delete pengabdian
        $pengabdian->delete();

        //redirect to index
        return redirect()->route('pengabdian.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function download_pengabdian(string $id)
    {
        $pengabdian = pengabdian::findOrFail($id);
        $myfile = storage_path("/app/public/file_pengabdian/" . $pengabdian->file_pengabdian);
        $download_name = 'File Pengabdian ' . $pengabdian->tim . '.pdf';
        return response()->download($myfile, $download_name);
    }
}
