<?php

namespace App\Http\Controllers;

use App\Models\barangModel;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class barangController extends Controller
{
    //
    public function listBarang()
    {
        $barang = barangModel::all();
        return view('barang.barang', compact('barang'));
    }

    public function detailBarang($id)
    {
        $data = barangModel::findOrFail($id);
        return view('barang.detail-barang', compact('data'));
    }

    public function tambahBarang()
    {
        return view('barang.tambah-barang');
    }

    public function simpanBarang(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            // 'foto' => 'required',
        ], [
            'nama_barang.required' => 'nama_barang harus diisi.',
            'harga.required' => 'harga harus diisi.',
            'stok.required' => 'stok harus diisi.',
            'foto.required' => 'foto harus diunggah.',
        ]);

        // simpan data ( simple )
        $data = new barangModel();
        $data->nama_barang = $request->nama_barang;
        $data->harga = $request->harga;
        $data->stok = $request->stok;
        // Proses file foto
        if ($request->hasFile('foto')) {
            // ambil data foto melalui name form
            $file = $request->file('foto');
            // pakai nama original
            $fileName =  $file->getClientOriginalName();
            // simpan di public/uploads
            $file->move(public_path('uploads'), $fileName);
            $data->foto = $fileName;
        }
        $data->save();

        return redirect()->route('listBarang')->with('success', 'inputan berhasil ditambahkan');
    }

    public function editBarang($id)
    {
        $data = barangModel::findOrFail($id);
        return view('barang.edit-barang', compact('data'));
    }

    public function updatebarang(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ], [
            'nama_barang.required' => 'nama_barang harus diisi.',
            'harga.required' => 'harga harus diisi.',
            'stok.required' => 'stok harus diisi.',
        ]);

        // simpan data ( simple )
        $data = barangModel::findOrFail($id);
        $data->nama_barang = $request->nama_barang;
        $data->harga = $request->harga;
        $data->stok = $request->stok;
        $data->save();

        return redirect()->route('listBarang')->with('success', 'inputan berhasil ditambahkan');
    }

    public function hapusBarang($id)
    {
        try {
            // Temukan barang berdasarkan ID
            $barang = barangModel::findOrFail($id);
            // Cek apakah ada file foto terkait di 'uploads' dan hapus jika ada
            if ($barang->foto && file_exists(public_path('uploads/' . $barang->foto))) {
                unlink(public_path('uploads/' . $barang->foto));
                // Hapus data barang dari database
                $barang->delete();
            }
            return to_route('listBarang');
        } catch (\Exception $e) {
            return to_route('listBarang')->withErrors('gagal hapus');
        }
    }
}