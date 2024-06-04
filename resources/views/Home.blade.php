@extends('template.master')


@section('title')
HOME
@endsection


@section('konten')

<div id="sambutan_rektor" class="bg-light py-5 px-2">
    <div class="container bg-white p-5 rounded">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><i class="fa-solid fa-house"></i>  <a class="text-decoration-none text-dark" href="{{ url('/') }}">Beranda</a></li>
            </ol>
          </nav>



          <h1>SELAMAT DATANG DI E-LIBRARY AMIK YPAT PURWAKARTA</h1>

          <div class="row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <div class="card bg-success-subtle">
                <div class="card-body">
                  <h2 class="card-title"><span class="text-success">{{ $jumlah_buku }}</span> Buku</h2>
                  <p class="card-text">Jumlah Buku Tahun Ini</p>
                  <a href="{{ route('data-buku') }}" class="btn btn-success">Telusuri  </a>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card bg-success-subtle">
                <div class="card-body">
                  <h2 class="card-title"><span class="text-success">{{ $jumlah_penelitian }}</span> Penelitian</h2>
                  <p class="card-text">Jumlah Penelitian Tahun Ini</p>
                  <a href="{{ route('data-penelitian') }}" class="btn btn-success">Telusuri  </a>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card bg-success-subtle">
                <div class="card-body">
                  <h2 class="card-title"><span class="text-success">{{ $jumlah_pengabdian }}
                    </span> Pengabdian</h2>
                  <p class="card-text">Jumlah Pengabdian Tahun Ini</p>
                  <a href="{{ route('data-pengabdian') }}" class="btn btn-success">Telusuri  </a>
                </div>
              </div>
            </div>
          </div>

            {{-- Diposting : {{ $sambutans->updated_at->diffForHumans() }} --}}
    </div>
</div>
@endsection
