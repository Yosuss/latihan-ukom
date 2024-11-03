<form action="{{ route('hapusBarang', $item->id_barang) }}" method="POST"
    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
    @csrf
    @method('DELETE')
    <button id="hapus"
        class="bg-red-500 hover:bg-red-700 text-white px-4 py-1 rounded-lg font-semibold w-full">
        {{-- hapus --}}
        hapus
    </button>
</form>
