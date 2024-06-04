<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Data Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label class="text-lg font-semibold">NAMA PENULIS</label>
                            <input type="text" class="form-input w-full px-4 py-3 rounded-md hover:rounded-md shadow hover:shadow-lg" @error('nama_penulis') is-invalid @enderror name="nama_penulis" value="{{ old('nama_penulis', $buku->nama_penulis) }}" placeholder="Masukkan Nama Penulis">

                            <!-- error message untuk title -->
                            @error('nama_penulis')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="text-lg font-semibold">JUDUL BUKU</label>
                            <input type="text" class="form-input w-full px-4 py-3 rounded-md hover:rounded-md shadow hover:shadow-lg" @error('judul') is-invalid @enderror name="judul" value="{{ old('judul', $buku->judul) }}" placeholder="Masukkan Nama Penulis">

                            <!-- error message untuk title -->
                            @error('judul')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="gap-4 columns-5">
                            <div class="form-group mb-3">
                                <label class="text-lg font-semibold">TAHUN TERBIT</label>
                                <input type="text" class="form-input w-full px-4 py-3 rounded-md hover:rounded-md shadow hover:shadow-lg" @error('tahun_terbit') is-invalid @enderror name="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" placeholder="Masukkan Tahun Terbit">


                                <!-- error message untuk title -->
                                @error('tahun_terbit')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="text-lg font-semibold">KATEGORI BUKU</label>
                                <select name="kategori" class="form-select w-full px-4 py-3 rounded-md hover:rounded-md shadow hover:shadow-lg" @error('kategori') is-invalid @enderror name="kategori" value="{{ old('kategori') }}" placeholder="Masukkan Kategori">
                                    <option value="Non-Fiksi">Non-Fiksi</option>
                                    <option value="Fiksi">Fiksi</option>
                                  </select>

                                <!-- error message untuk title -->
                                @error('kategori')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="text-lg font-semibold">JUMLAH HALAMAN</label>
                                <input type="text" class="form-input w-full px-4 py-3 rounded-md hover:rounded-md shadow hover:shadow-lg" @error('jml_hal') is-invalid @enderror name="jml_hal" value="{{ old('jml_hal', $buku->jml_hal) }}" placeholder="Masukkan Jumlah">


                                <!-- error message untuk title -->
                                @error('jml_hal')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="text-lg font-semibold">NISBN</label>
                                <input type="text" class="form-input w-full px-4 py-3 rounded-md hover:rounded-md shadow hover:shadow-lg" @error('nisbn') is-invalid @enderror name="nisbn" value="{{ old('nisbn', $buku->nisbn) }}" placeholder="Masukkan NISBN">


                                <!-- error message untuk title -->
                                @error('nisbn')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="text-lg font-semibold">KOTA</label>
                                <input type="text" class="form-input w-full px-4 py-3 rounded-md hover:rounded-md shadow hover:shadow-lg" @error('kota') is-invalid @enderror name="kota" value="{{ old('kota', $buku->kota) }}" placeholder="Masukkan Nama kota">


                                <!-- error message untuk title -->
                                @error('kota')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>


                        <div class="form-group mb-3">
                            <label class="text-lg font-semibold">PENERBIT BUKU</label>
                            <input type="text" class="form-input w-full px-4 py-3 rounded-md hover:rounded-md shadow hover:shadow-lg" @error('kota') is-invalid @enderror name="penerbit" value="{{ old('penerbit', $buku->penerbit) }}" placeholder="Masukkan Nama Penerbit">


                            <!-- error message untuk title -->
                            @error('penerbit')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-semibold">DESKRIPSI BUKU</label>
                            <textarea class="form-input w-full px-4 py-3 rounded-md hover:rounded-md shadow hover:shadow-lg @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5" placeholder="Masukkan Deskripsi Buku">{{ old('deskripsi', $buku->deskripsi) }}</textarea>

                            <!-- error message untuk deskripsi -->
                            @error('deskripsi')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-semibold">UPLOAD FILE COVER</label>
                            <br>
                            <input type="file" class="form-control @error('cover_buku') is-invalid @enderror" name="cover_buku">

                            <!-- error message untuk cover_buku -->
                            @error('cover_buku')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="bg-green-800 rounded text-white p-2 me-1">SAVE</button>
                        <button type="reset" class="bg-yellow-600 rounded text-white p-2 me-1 outline-cyan-500">RESET</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
