<?php

namespace App\Http\Controllers\Api;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\KategoriResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function index()
    {
        //get posts
        $kategori = Kategori::with('menu')->get();

        //return collection of posts as a resource
        return new KategoriResource(true, 'List Data Kategori', $kategori);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'daftar_menu_id' => 'required',
            'kategori'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $datamenu = Kategori::create([
            'daftar_menu_id' => $request->daftar_menu_id,
            'kategori' => $request->kategori,
        ]);

        //return response
        return new KategoriResource(true, 'Data kategori Berhasil Ditambahkan!', $datamenu);
    }

    public function show($kategori)
    {
        //return single post as a resource
        return new KategoriResource(true, 'Data Kategori Ditemukan!', $kategori);
    }

    public function update(Request $request, Kategori $kategori)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'daftar_menu_id' => 'required',
            'kategori'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //check if image is not empty
        if ($request) {

            
            //update post without image
            $kategori->update([
                'daftar_menu' => $request->daftar_menu_id,
                'kategori' => $request->kategori,
                
            ]);

        } 

        //return response
        return new KategoriResource(true, 'Data kategori Berhasil Diubah!', $kategori);
    }

    public function destroy(Kategori $kategori)
    {

        //delete post
        $kategori->delete();

        //return response
        return new KategoriResource(true, 'Data Menu Berhasil Dihapus!', null);
    }
}
