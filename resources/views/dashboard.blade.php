<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                        {{ __("Selamat Datang di E-Library Management System") }}

                        <div class="bg-gray-100 py-24 sm:py-32">
                            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                              <dl class="grid grid-cols-1 gap-x-8 gap-y-16 text-center lg:grid-cols-3">
                                <div class="outline outline-offset-2 outline-gray-300 bg-gray-200 mx-auto flex max-w-xs flex-col gap-y-4 rounded-md p-2">
                                  <dt class="text-base leading-7 text-gray-600">Jumlah Buku Tahun Ini</dt>
                                  <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-3xl">{{ $jumlah_buku }} Buku</dd>
                                </div>
                                <div class="outline outline-offset-2 outline-gray-300 bg-gray-200 mx-auto flex max-w-xs flex-col gap-y-4 rounded-md p-2">
                                  <dt class="text-base leading-7 text-gray-600">Jumlah Penelitian Tahun Ini</dt>
                                  <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-3xl">{{ $jumlah_penelitian }} Penelitian</dd>
                                </div>
                                <div class="outline outline-offset-2 outline-gray-300 bg-gray-200 mx-auto flex max-w-xs flex-col gap-y-4 rounded-md p-2">
                                  <dt class="text-base leading-7 text-gray-600">Jumlah Pengabdian Tahun Ini</dt>
                                  <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-3xl">{{ $jumlah_pengabdian }} Pengabdian</dd>
                                </div>
                              </dl>
                            </div>
                          </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
