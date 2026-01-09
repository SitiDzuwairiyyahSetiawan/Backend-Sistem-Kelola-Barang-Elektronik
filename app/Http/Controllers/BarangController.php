<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends BaseController
{
    //create
    public function create(Request $request)
    {
        $data = $request->all();
        $barang = Barang::create($data);

        return response()->json($barang, 201);
    }

    //get
    public function index()
    {
        $barang = Barang::all();
        return response()->json($barang);
    }

    //get by ID
    public function detail($id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return response()->json([
                'success' => false,
                'message' => 'Data barang tidak ditemukan'
            ], 404);
        }

        return response()->json($barang);
    }

    //update by ID
    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return response()->json([
                'success' => false,
                'message' => 'Data barang tidak ditemukan'
            ], 404);
        }

        $barang->update([
            'nama_barang' => $request->input('nama_barang'),
            'kategori_barang' => $request->input('kategori_barang'),
            'satuan' => $request->input('satuan'),
            'harga' => $request->input('harga'),
            'deskripsi' => $request->input('deskripsi'),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data barang berhasil diupdate',
            'data' => $barang,
        ], 200);
    }

    //delete by ID
    public function delete($id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return response()->json([
                'success' => false,
                'message' => 'Data barang tidak ditemukan'
            ], 404);
        }

        $barang->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data barang berhasil dihapus'
        ], 200);
    }
}