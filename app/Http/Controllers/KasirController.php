<?php

namespace App\Http\Controllers;

use App\Models\Kasir;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kasir = Kasir::paginate();
        return view('kasir.tampilankasir', compact('kasir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kasir.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_kasir' => 'required',
            'alamat_kasir' => 'required',
            'no_telp' => 'required',
            'aktivitas' => 'required'
        ]);

        Kasir::create([
            'nama_kasir' => $request->nama_kasir,
            'alamat_kasir' => $request->alamat_kasir,
            'no_telp' => $request->no_telp,
            'aktivitas' => $request->aktivitas
        ]);
        
        return redirect('/kasir')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kasir = Kasir::findorfail($id);
        return view('Kasir.edit', compact('kasir'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_kasir' => 'required',
            'alamat_kasir' => 'required',
            'no_telp' => 'required'
        ]);

        $kasir = Kasir::findorfail($id);
        $kasir->update($request->all());
        return redirect('kasir')->with('success','Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kasir::destroy($id);
        return redirect('kasir')->with('flash_massage', 'Kasir deleted!');
    }
}
