<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kategori Menu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- area judul dan button kiri kanan -->
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h5 class="text-lg font-semibold dark:text-white">Kategori</h5>
                        <span class="font-md text-sm dark:text-white">Kategori Menu</span>
                    </div>
                </div>

                <form method="post" action="{{ route('kategori.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <x-input-label for="nama" :value="__('Nama Menu')" />
                        <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full" required />
                        <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                    </div>
                    <div>
                        <x-input-label for="kategori" :value="__('Kategori')" />
                        <select name="id_kategori" class="mt-1 block w-full bg-transparent rounded-md dark:text-white" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategori as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>                            
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                    </div>
                    <div>
                        <x-input-label for="thumbnail" :value="__('Thumbnail')" />
                        <x-text-input id="thumbnail" name="thumbnail" type="file" class="mt-1 block w-full" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('thumbnail')" />
                    </div>
                    <div>
                        <x-input-label for="harga" :value="__('Harga')" />
                        <x-text-input id="harga" name="harga" type="number" class="mt-1 block w-full" required />
                        <x-input-error class="mt-2" :messages="$errors->get('harga')" />
                    </div>
                    <div>
                        <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                        <textarea name="deskripsi" class="mt-1 block w-full bg-transparent rounded-md dark:text-white"></textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('deksripsi')" />
                    </div>
                    <button type="submit" class="bg-red-700 hover:bg-red-500 text-white px-6 py-2 rounded-md">Tambah</button>
                </form>

            </div>
        </div>
</x-app-layout>