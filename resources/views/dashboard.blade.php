@extends('layout')
@section('judul','Dashboard')
@section('isi')
<div class="row">
<div class="card" style="padding: 10px 60px">
    <h3 class="card-header">Daftar Menu</h3>
    <div class="card-body">
        <h5 class="card-title">Berisi Menu menu</h5>
        <p class="card-text">lihat data-data menu</p>
        <a href="#!" class="btn  btn-primary">Masuk</a>
    </div>
    </div>
<div class="card mx-3" style="padding: 10px 60px">
<h3 class="card-header">Data Manager</h3>
<div class="card-body">
    <h5 class="card-title">Berisi data manager</h5>
    <p class="card-text">Lihat Para Manajer</p>
    <a href="#!" class="btn  btn-primary">Masuk</a>
</div>
</div>

<div class="card" style="padding: 10px 60px">
<h3 class="card-header">Data Pegawai</h3>
<div class="card-body">
    <h5 class="card-title">Berisi data-data kasir</h5>
    <p class="card-text">lihat para kasir</p>
    <a href="#!" class="btn  btn-primary">Masuk</a>
</div>
</div>
</div>  
@endsection