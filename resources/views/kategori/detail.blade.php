<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Kategori') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- list data menu yang sesuai dengan id yang dipilih -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- area judul dan button kiri kanan -->
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h5 class="text-lg font-semibold dark:text-white">Data Menu</h5>
                        <span class="font-md text-sm dark:text-white">Data semua menu yang ada di kategori <b>{{ $data->nama_kategori }}</b></span>
                    </div>
                </div>

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
                                Harga
                            </th>
                            
                           
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($menu as $item)
                        <tr>
                            <td class="dark:text-white px-6"><a href="{{ route('menu.detail', $item->id) }}" class="text-md font-semibold">{{ $item->nama }}</a> </td>
                            <td class="dark:text-white px-6 py-2">
                                <img src="{{ asset('storage/images/menu/' .$item->thumbnail) }}" width="60" alt="Gambar Kategori">
                            </td>
                            <td class="dark:text-white px-6">IDR. {{ $item->harga }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <!-- edit data -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- area judul dan button kiri kanan -->
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h5 class="text-lg font-semibold dark:text-white">{{ $data->nama_kategori }}</h5>
                        <span class="font-md text-sm dark:text-white">Masukan data dibawah jika ingin ada perubahan.</span>
                    </div>
                </div>

                <form method="post" action="{{ route('kategori.update', $data->id) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div>
                        <x-input-label for="nama_kategori" :value="__('Nama kategori')" />
                        <x-text-input id="nama_kategori" name="nama_kategori" type="text" class="mt-1 block w-full" value="{{ $data->nama_kategori }}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('nama_kategori')" />
                    </div>
                    <div>
                        <x-input-label for="thumbnail" :value="__('Thumbnail')" />
                        <img src="{{ asset('storage/images/kategori/'.$data->thumbnail) }}" width="60" alt="Thumbnail" class="mt-6 mb-3">
                        <x-text-input id="thumbnail" name="thumbnail" type="file" class="mt-1 block w-full" value="{{ $data->thumbnail }}" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('thumbnail')" />
                    </div>
                    <button type="submit" class="bg-red-700 hover:bg-red-500 text-white px-6 py-2 rounded-md">Edit</button>
                </form>

                <div class="mt-6 text-end">
                    <form action="{{ route('kategori.delete', $data->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('kategori.index') }}" class="border border-red-700 py-2 px-6 dark:text-white rounded-md">Kembali</a>
                        <button type="submit" class="bg-red-700 hover:bg-red-500 text-white px-6 py-2 rounded-md" onclick="return confirm('Yakin nii mau dihapus?')">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>