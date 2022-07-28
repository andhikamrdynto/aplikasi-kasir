@extends('layout')
@section('judul','Laporan')
@section('isi')

<div class="card">
    <div class="card-body" >
    <a style="padding: 30px 40px;" href="{{ url('laporan/create') }}"class="btn btn-icon icon-left btn-primary mb-4"><span >Tambah</span></a>

    <table class="table table-hover table-bordered dataTable" id="laporan-table">
            <thead style="font-size: 14px">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Waktu Dan Tanggal</th>
                    <th scope="col">Laporan Transaksi</th>
                    <th scope="col">Laporan Pendapatan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="alldata">
              @foreach ( $laporan as $item )
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item->waktu_tanggal }}</td>                        
                <td>{{ $item->laporan_transaksi }}</td>
                <td>{{ $item->laporan_pendapatan_harian }}</td>
                <td style="display: flex">
                  <div class="dis d-flex">
                  <a href="{{ url('laporan/'.$item->id.'/edit') }}" class="btn btn-icon btn-warning ms-1" ><i class="fas fa-pen"></i></a>
                  <form action="{{ url('laporan',$item->id) }}" method="POST">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-icon btn-danger delete ms-1" data-name="{{ $item->waktu_tanggal }}"><i class="fas fa-trash"></i></button>
                  </form>
                </div>
                  </td>
            </tr>
              @endforeach
          </tbody>
            
        </table>
    </div>
</div>

@endsection