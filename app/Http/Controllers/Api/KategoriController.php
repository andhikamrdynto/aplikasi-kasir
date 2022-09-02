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
        $kategori = Kategori::create([
            'daftar_menu_id' => $request->daftar_menu_id,
            'kategori' => $request->kategori,
        ]);

        //return response
        return new KategoriResource(true, 'Data kategori Berhasil Ditambahkan!', $kategori);
    }

    public function show($kategori)
    {
        //return single post as a resource
        return new KategoriResource(true, 'Data Kategori Ditemukan!', $kategori);
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validator = Validator::make($request->all(), [
            'daftar_menu_id'   => 'required',
            'kategori' => 'required',
        ]);
        
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //find post by ID
        $kategori = Kategori::findOrFail($kategori->id);

        if($kategori) {

            //update post
            $kategori->update([
                'daftar_menu_id'     => $request->daftar_menu_id,
                'kategori'   => $request->kategori
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Kategori Updated',
                'data'    => $kategori 
            ], 200);

        }

        //data post not found
        return response()->json([
            'success' => false,
            'message' => 'Kategori Not Found',
        ], 404);

    }

    public function destroy(Kategori $kategori)
    {

        //delete post
        $kategori->delete();

        //return response
        return new KategoriResource(true, 'Data Menu Berhasil Dihapus!', null);
    }
}
