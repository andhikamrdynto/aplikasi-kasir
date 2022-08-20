<?php

namespace App\Http\Controllers\Api;

use App\Models\Laporan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\LaporanResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LaporanController extends Controller
{
    public function index()
    {
        //get posts
        $laporan = Laporan::with('laporan')->get();

        //return collection of posts as a resource
        return new LaporanResource(true, 'List Data Laporan', $laporan);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'laporan_transaksi' => 'required',
            'daftar_menu_id'     => 'required',
            'laporan_pendapatan_harian'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $datalapor = Laporan::create([
            'laporan_transaksi' => $request->laporan_transaksi,
            'daftar_menu_id' => $request->daftar_menu_id,
            'laporan_pendapatan_harian' => $request->laporan_pendapatan_harian,
        ]);

        //return response
        return new LaporanResource(true, 'Data Laporan Berhasil Ditambahkan!', $datalapor);
    }

    public function show($laporan)
    {
        //return single post as a resource
        return new LaporanResource(true, 'Data laporan Ditemukan!', $laporan);
    }

    public function update(Request $request, Laporan $laporan)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'laporan_transaksi' => 'required',
            'daftar_menu_id'     => 'required',
            'laporan_pendapatan_harian'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //check if image is not empty
        if ($request) {

            
            //update post without image
            $laporan->update([
            'laporan_transaksi' => $request->laporan_transaksi,
            'daftar_menu_id' => $request->daftar_menu_id,
            'laporan_pendapatan_harian' => $request->laporan_pendapatan_harian,
                
            ]);

        } 

        //return response
        return new LaporanResource(true, 'Data kategori Berhasil Diubah!', $kategori);
    }

    public function destroy(Laporan $laporan)
    {

        //delete post
        $laporan->delete();

        //return response
        return new LaporanResource(true, 'Data Laporan Berhasil Dihapus!', null);
    }
}
