<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Pengabdian') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <button class="bg-green-800 hover:bg-green-700 p-2 mb-3 rounded text-white"><a href="{{ route('pengabdian.create') }}">Tambah Data</a></button>
                    <div class="w-full border border-gray-200 rounded-xl overflow-x-auto">
                      <table class="table-auto w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 text-slate-800">
                          <tr class="divide-x divide-gray-200">
                            <th class="px-4 py-2">NO.</th>
                            <th class="px-4 py-2">NAMA TIM</th>
                            <th class="px-4 py-2">JUDUL</th>
                            <th class="px-4 py-2" style="width: 20%">AKSI</th>
                          </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white text-slate-800">
                            @forelse ( $pengabdians as $pengabdian )
                            <tr class="divide-x divide-gray-200">
                                <td class="px-4 py-2 text-center" style="width: 50px;">{{ $i++ }}</td>
                                <td class="px-4 py-2 text-wrap">{{ $pengabdian->tim }}</td>
                                <td class="px-4 py-2 text-wrap">{{ $pengabdian->judul  }} dan {{ $pengabdian->id }}</td>
                                <td class="px-2 py-2 text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pengabdian.destroy', $pengabdian->id) }}" method="POST">
                                        <a href="{{ route('pengabdian_download', $pengabdian->id) }}" class="bg-yellow-600 p-2 rounded text-white"><i class="fa-solid fa-download"></i></a>
                                        <a href="{{ route('pengabdian.edit', $pengabdian->id) }}" class="bg-blue-600 p-2 rounded text-white"><i class="fa-solid fa-pen-to-square"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 p-2 rounded text-white"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                              </tr>
                            @empty
                            <div class="alert alert-danger">
                                Data Pengabdian belum Tersedia.
                            </div>
                            @endforelse

                        </tbody>
                      </table>
                      {{ $pengabdians->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
