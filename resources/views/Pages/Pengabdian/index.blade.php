@extends('template.master')


@section('title')
Data Pengabdian
@endsection


@section('konten')

<div id="pengabdian_index" class="bg-light py-5 px-2">
    <div class="container bg-white p-5 rounded">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><i class="fa-solid fa-house"></i>  <a class="text-decoration-none text-dark" href="{{ url('/') }}">Beranda</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Pengabdian</li>
            </ol>
          </nav>



          <h1>DATA PENGABDIAN</h1>
          <table class="table table-bordered table-striped text-center" id="example" style="width: 100%;">
            <thead>
              <tr>
                <th scope="col" style="width: 40px;">NO.</th>
                <th scope="col" style="width: 400px">NAMA TIM</th>
                <th scope="col">JUDUL</th>
                <th scope="col" style="width: 100px;">AKSI</th>
              </tr>
            </thead>
            <tbody>


              @forelse ($pengabdians as $pengabdian)
                <tr>
                    <td class="text-center">{{ ++$i; }}</td>
                    <td>
                 {{ $pengabdian->tim }}
                    </td>
                    <td>
                        {{ $pengabdian->judul }}
                    </td>

                    <td class="text-center">
                        <button class="btn btn-success"><a href="{{ route('pengabdian_downloads', $pengabdian->id) }}" class="text-decoration-none text-white">Download</a></button>
                    </td>

                </tr>
              @empty
                  <div class="alert alert-danger">
                      Data Pengabdian Belum Tersedia.
                  </div>
              @endforelse
            </tbody>
          </table>
          {{ $pengabdians->links() }}
    </div>
</div>
@endsection
