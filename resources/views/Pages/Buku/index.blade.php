@extends('template.master')


@section('title')
Data Buku
@endsection


@section('konten')

<div id="penelitian_index" class="bg-light py-5 px-2">
    <div class="container bg-white p-5 rounded">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><i class="fa-solid fa-house"></i>  <a class="text-decoration-none text-dark" href="{{ url('/') }}">Beranda</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Buku</li>
            </ol>
          </nav>



          <h1>DATA BUKU</h1>
          <table class="table table-bordered table-striped text-center" id="example" style="width: 100%;">
            <thead>
              <tr>
                <th scope="col" style="width: 40px;">NO.</th>
                <th scope="col" style="width: 400px">NAMA PENULIS</th>
                <th scope="col">JUDUL</th>
                <th scope="col" style="width: 100px;">TAHUN</th>
                <th scope="col" style="width: 100px;">AKSI</th>
              </tr>
            </thead>
            <tbody>


              @forelse ($bukus as $buku)
                <tr>
                    <td class="text-center">{{ ++$i; }}</td>
                    <td>
                 {{ $buku->nama_penulis }}
                    </td>
                    <td>
                        {{ $buku->judul }}
                    </td>

                    <td>
                 {{ $buku->tahun_terbit }}
                    </td>

                    <td class="text-center">
                        <button class="btn btn-success"><a href="{{ route('buku_downloads', $buku->id) }}" class="text-decoration-none text-white">Download</a></button>
                    </td>


                </tr>
              @empty
                  <div class="alert alert-danger">
                      Data Buku Belum Tersedia.
                  </div>
              @endforelse
            </tbody>
          </table>
          {{ $bukus->links() }}
{{--
          <button class="btn btn-success">
            <a href="{{ route('cobadulu') }}" class="text-white">Download</a>
          </button> --}}
    </div>
</div>
@endsection
