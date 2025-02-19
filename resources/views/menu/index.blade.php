<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Menu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- area judul dan button kiri kanan -->
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h5 class="text-lg font-semibold dark:text-white">Daftar Menu</h5>
                        <span class="font-md text-sm dark:text-white">Klik pada nama menu untuk melihat detail.</span>
                    </div>
                    <div>
                        <a href="{{ route('menu.create') }}" class="bg-red-700 px-6 py-2 text-white hover:bg-red-500 rounded-md">Tambah Menu</a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white dark:bg-gray-800 rounded-lg">
                        <thead class="bg-gray-200 dark:bg-red-700">
                            <tr>
                                <th scope="col" class="py-3 px-6 text-left text-xs font-medium text-gray-700 dark:text-white uppercase tracking-wider">
                                    Nama Menu
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium text-gray-700 text-start dark:text-white uppercase tracking-wider">
                                    Thumbnail
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium text-gray-700 text-start dark:text-white uppercase tracking-wider">
                                    Kategori
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($data as $item)
                            <tr>
                                <td class="dark:text-white px-6"><a href="{{ route('kategori.detail', $item->id) }}" class="text-md font-semibold">{{ $item->nama }}</a> </td>
                                <td class="dark:text-white px-6 py-2">
                                    <img src="{{ asset('storage/images/menu/' .$item->thumbnail) }}" width="60" alt="Gambar Kategori">
                                </td>
                                <td class="dark:text-white px-6">{{ $item->kategori->nama_kategori }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</x-app-layout>