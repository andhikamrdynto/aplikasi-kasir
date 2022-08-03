@extends('layout')
@section('isi')
<div class="card">
    <div class="card-body">
        <form action="{{ url('kasir/' .$kasir->id) }}" method="post">
            {{ csrf_field() }}
            @method("PATCH")
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="floating-label" for="Text">Nama Kasir</label>
                        <input type="text" class="form-control" id="Text" value="{{ $kasir->nama_kasir }}" placeholder="Masukkan Nama" name="nama_kasir">
                        @error('nama_kasir')
                        <div class="text-warning">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="floating-label" for="Text">Alamat</label>
                        <input type="text" class="form-control" id="Text" value="{{ $kasir->alamat_kasir }}" placeholder="Alamat" name="alamat_kasir">
                        @error('alamat_kasir')
                        <div class="text-warning">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="floating-label" for="Text">No. Telepon</label>
                        <input type="number" class="form-control" id="Text" value="{{ $kasir->no_telp }}" placeholder="No Telepon" name="no_telp">
                        @error('no_telp')
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