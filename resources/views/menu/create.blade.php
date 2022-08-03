@extends('layout')
@section('isi')
<div class="card">
    <div class="card-body">
        <form action="{{ url('menu') }}" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="floating-label" for="Text">Daftar Menu</label>
                        <input type="text" class="form-control" id="Text" placeholder="Masukkan Daftar Menu" name="daftar_menu">
                        @error('daftar_menu')
                        <div class="text-warning">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="floating-label" for="Text">Harga Menu</label>
                        <input type="text" class="form-control" id="Text" placeholder="Harga Menu" name="harga_menu">
                        @error('harga_menu')
                        <div class="text-warning">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="floating-label" for="Text">Stock</label>
                        <input type="number" class="form-control" id="Text" placeholder="Stock" name="stock_menu">
                        @error('stok_menu')
                        <div class="text-warning">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>
@endsection
