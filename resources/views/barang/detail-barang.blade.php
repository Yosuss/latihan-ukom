@extends('template')
@section('konten')
    <div class="bg-gray-200 flex items-center justify-center min-h-screen capitalize">
        <div class="bg-white p-8 rounded-lg shadow-md max-w-md ">
            <h2 class="text-4xl font-bold mb-6 text-center capitalize">detail data</h2>
            <form action="{{ route('detailBarang', $data->id_barang) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="id_barang" class="block text-2xl font-medium text-gray-700">id barang</label>
                    <div name="id_barang" class="text-xl" id="id_barang">{{ $data->id_barang }}</div>
                </div>
                <div class="mb-4">
                    <label for="nama" class="block text-2xl font-medium text-gray-700">nama barang</label>
                    <div name="nama" class="text-xl" id="nama">{{ $data->nama_barang }}</div>
                </div>
                <div class="mb-4">
                    <label for="harga" class="block text-2xl font-medium text-gray-700">harga</label>
                    <div name="harga" class="text-xl" id="harga">{{ $data->harga }}</div>
                </div>
                <div class="mb-4">
                    <label for="stok" class="block text-2xl font-medium text-gray-700">stok</label>
                    <div name="stok" class="text-xl" id="stok">{{ $data->stok }}</div>
                </div>
                <div class="mb-4">
                    <label for="foto" class="block text-2xl font-medium text-gray-700">foto</label>
                    <img src="{{ asset('uploads/' . $data->foto) }}" alt="Foto" class="w-full h-full object-cover">
                </div>
                <div class="btn flex gap-2">
                    <a href="{{ route('listBarang') }}"
                        class="w-full text-2xl font-semibold flex justify-center items-center shadow-md bg-gray-400 text-white p-2 rounded-md hover:bg-gray-700">
                        <button type="button">kembali</button>
                    </a>
                </div>
            </form>
        </div>

    </div>
@endsection
