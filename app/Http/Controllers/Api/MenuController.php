<?php

namespace App\Http\Controllers\Api;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MenuResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    public function index()
    {
        //get posts
        $menus = Menu::latest()->paginate(5);

        //return collection of posts as a resource
        return new MenuResource(true, 'List Data Menus', $menus);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'daftar_menu' => 'required',
            'harga_menu'     => 'required',
            'stock_menu'   => 'required',
            'foto_menu'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        $image = $request->file('foto_menu');
        $image->storeAs('public/posts', $image->hashName());

        //create post
        $menu = Menu::create([
            'daftar_menu' => $request->daftar_menu,
            'harga_menu' => $request->harga_menu,
            'stock_menu' => $request->stock_menu,
            'foto_menu'     => $image->hashName(),
        ]);

        //return response
        return new MenuResource(true, 'Data Menu Berhasil Ditambahkan!', $menu);
    }

    public function show(Menu $menu)
    {
        //return single post as a resource
        return new MenuResource(true, 'Data Menu Ditemukan!', $menu);
    }

    public function update(Request $request, Menu $menu)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'daftar_menu' => 'required',
            'harga_menu'     => 'required',
            'stock_menu'   => 'required',
            'foto_menu'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //check if image is not empty
        if ($request->hasFile('foto_menu')) {

            //upload image
            $image = $request->file('foto_menu');
            $image->storeAs('public/posts', $image->hashName());

            //delete old image
            Storage::delete('public/posts/'.$menu->image);

            //update post with new image
            $menu->update([
                'daftar_menu' => $request->daftar_menu,
                'harga_menu' => $request->harga_menu,
                'stock_menu' => $request->stock_menu,
                'foto_menu'     => $image->hashName(),
            ]);

        } else {

            //update post without image
            $menu->update([
                'daftar_menu' => $request->daftar_menu,
                'harga_menu' => $request->harga_menu,
                'stock_menu' => $request->stock_menu,
            ]);
        }

        //return response
        return new MenuResource(true, 'Data Menu Berhasil Diubah!', $menu);
    }

    public function destroy(Menu $menu)
    {
        //delete image
        Storage::delete('public/posts/'.$menu->foto_menu);

        //delete post
        $menu->delete();

        //return response
        return new MenuResource(true, 'Data Menu Berhasil Dihapus!', null);
    }
}
