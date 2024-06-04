<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\penelitian;
use App\Models\pengabdian;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(): View
    {
        $buku = buku::all();
        $jumlah_buku = count($buku);

        $penelitian = penelitian::all();
        $jumlah_penelitian = count($penelitian);

        $pengabdian = pengabdian::all();
        $jumlah_pengabdian = count($pengabdian);

        return view('Home', compact('jumlah_buku', 'jumlah_penelitian', 'jumlah_pengabdian'));
    }

    public function penelitian(): View
    {
        $i = 0;
        $penelitians = penelitian::latest()->paginate(10);
        return view('Pages.Penelitian.index', compact('penelitians', 'i'));
    }

    public function pengabdian(): View
    {
        $i = 0;
        $pengabdians = pengabdian::latest()->paginate(10);
        return view('Pages.Pengabdian.index', compact('pengabdians', 'i'));
    }

    public function buku(): View
    {
        $i = 0;
        $bukus = buku::latest()->paginate(10);
        return view('Pages.Buku.index', compact('bukus', 'i'));
    }

    public function coba_download()
    {
        $myfile = storage_path("/app/public/bakal.pdf");
        return response()->download($myfile);
    }
}
