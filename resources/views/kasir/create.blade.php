@extends('layout')
@section('isi')
<div class="card">
    <div class="card-body">
        <form action="{{ url('kasir') }}" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="floating-label" for="Text">Nama Kasir</label>
                        <input type="text" class="form-control" id="Text" placeholder="Masukkan Nama" name="nama_kasir">
                        @error('nama_kasir')
                        <div class="text-warning">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="floating-label" for="Text">Alamat</label>
                        <input type="text" class="form-control" id="Text" placeholder="Alamat" name="alamat_kasir">
                        @error('alamat_kasir')
                        <div class="text-warning">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="floating-label" for="Text">No. Telepon</label>
                        <input type="number" class="form-control" id="Text" placeholder="No Telepon" name="no_telp">
                        @error('no_telp')
                        <div class="text-warning">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="floating-label" for="Text">Aktivitas</label>
                        <input type="text" class="form-control" id="disabledTextInput" placeholder="Aktivitas" name="aktivitas">
                        @error('aktivitas')
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