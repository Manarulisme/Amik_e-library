<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\penelitian;
use App\Models\pengabdian;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $buku = buku::all();
        $jumlah_buku = count($buku);

        $penelitian = penelitian::all();
        $jumlah_penelitian = count($penelitian);

        $pengabdian = pengabdian::all();
        $jumlah_pengabdian = count($pengabdian);

        return view('dashboard', compact('jumlah_buku', 'jumlah_penelitian', 'jumlah_pengabdian'));
    }
}
