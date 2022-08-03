@extends('layout')
@section('isi')
<div class="card">
    <div class="card-body">
        <form action="{{ url('menu/' .$menu->id) }}" method="post">
            {{ csrf_field() }}
            @method("PATCH")
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="floating-label" for="Text">Daftar Menu</label>
                        <input type="text" class="form-control" id="Text" value="{{ $menu->daftar_menu }}" placeholder="Masukkan Nama" name="daftar_menu">
                        @error('daftar_menu')
                        <div class="text-warning">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="floating-label" for="Text">Harga menu</label>
                        <input type="text" class="form-control" id="Text" value="{{ $menu->harga_menu }}" placeholder="Alamat" name="harga_menu">
                        @error('harga_menu')
                        <div class="text-warning">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="floating-label" for="Text">Stock</label>
                        <input type="number" class="form-control" id="Text" value="{{ $menu->stock_menu }}" placeholder="No Telepon" name="stock_menu">
                        @error('stock_menu')
                        <div class="text-warning">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
</div>
@endsection