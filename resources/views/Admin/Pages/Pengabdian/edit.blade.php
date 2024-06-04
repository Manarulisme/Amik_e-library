<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Data pengabdian') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form action="{{ route('pengabdian.update', $pengabdian->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label class="text-lg font-semibold">NAMA TIM PENGABDIAN</label>
                            <input type="text" class="form-input w-full px-4 py-3 rounded-md hover:rounded-md shadow hover:shadow-lg" @error('tim') is-invalid @enderror name="tim" value="{{ old('tim', $pengabdian->tim) }}" placeholder="Masukkan Tim Pengabdian">
                            <!-- error message untuk title -->
                            @error('tim')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-semibold">JUDUL PENGABDIAN</label>
                            <textarea class="form-input w-full px-4 py-3 rounded-md hover:rounded-md shadow hover:shadow-lg @error('judul') is-invalid @enderror" name="judul" rows="5" placeholder="Masukkan Judul pengabdian">{{ old('judul', $pengabdian->judul) }}</textarea>

                            <!-- error message untuk judul -->
                            @error('judul')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-semibold">UPLOAD FILE PENGABDIAN</label>
                            <br>
                            <input type="file" class="form-control" name="file_pengabdian">
                        </div>

                        <button type="submit" class="bg-green-800 rounded text-white p-2 me-1">SAVE</button>
                        <button type="reset" class="bg-yellow-600 rounded text-white p-2 me-1 outline-cyan-500">RESET</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
