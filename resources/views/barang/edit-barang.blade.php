@extends('template')
@section('konten')
    <div class="bg-gray-200 flex items-center justify-center min-h-screen capitalize">
        <div class="bg-white p-8 rounded-lg shadow-md max-w-md ">
            <h2 class="text-4xl font-bold mb-6 text-center capitalize">edit data</h2>
            <form action="{{ route('updateBarang', $data->id_barang) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nama_barang" class="block text-2xl font-medium text-gray-700">nama barang</label>
                    <input type="text" name="nama_barang" id="nama_barang"
                        class="mt-1 block w-full p-2 border-2 border-gray-300 rounded-md shadow-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-xl"
                        required value="{{ $data->nama_barang }}">
                </div>
                <div class="mb-4">
                    <label for="harga" class="block text-2xl font-medium text-gray-700">harga</label>
                    <input type="number" name="harga" id="harga"
                        class="mt-1 block w-full p-2 border-2 border-gray-300 rounded-md shadow-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-xl"
                        required value="{{ $data->harga }}">
                </div>
                <div class="mb-4">
                    <label for="stok" class="block text-2xl font-medium text-gray-700">stok</label>
                    <input type="number" name="stok" id="stok"
                        class="mt-1 block w-full p-2 border-2 border-gray-300 rounded-md shadow-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-xl"
                        required value="{{ $data->stok }}">
                </div>
                <div class="mb-4">
                    <label for="foto" class="block text-2xl font-medium text-gray-700">foto</label>
                    <img src="{{ asset('uploads/' . $data->foto) }}" alt="Foto"
                        class="w-full h-full object-cover rounded-lg shadow-md my-2">
                    <input type="file" name="foto" id="foto"
                        class="mt-1 block w-full p-2 border-2 border-gray-300 rounded-md shadow-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-xl"
                        value="{{ $data->foto }}">
                </div>
                <div class="btn flex gap-2">
                    <a href="{{ route('listBarang') }}"
                        class="w-full text-2xl font-semibold flex justify-center items-center shadow-md bg-gray-400 text-white p-2 rounded-md hover:bg-gray-700">
                        <button type="submit">kembali</button>
                    </a>
                    <button type="submit"
                        class="w-full text-2xl font-semibold bg-blue-600 text-white p-2 rounded-md shadow-md hover:bg-blue-700">edit</button>
                </div>
            </form>
        </div>

    </div>
@endsection
