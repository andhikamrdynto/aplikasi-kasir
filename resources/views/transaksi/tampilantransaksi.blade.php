@extends('layout')
@section('judul','Menu')
@section('isi')

<div class="card">
    <div class="card-body" >
    <a style="padding: 30px 40px;" href="{{ url('transaksi/create') }}"class="btn btn-icon icon-left btn-primary mb-4"><span >Tambah</span></a>

    <table class="table table-hover table-bordered dataTable" id="transaksi-table">
            <thead style="font-size: 14px">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Daftar Menu Terjual</th>
                    <th scope="col">Pendapatan</th>
                    <th scope="col">Waktu Transaksi</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="alldata">
              @foreach ( $transaksi as $item )
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item->menu_terjual }}</td>                        
                <td>{{ $item->pendapatan }}</td>
                <td>{{ $item->waktu_transaksi }}</td>
                <td style="display: flex">
                  <div class="dis d-flex">
                  <a href="{{ url('transaksi/'.$item->id.'/edit') }}" class="btn btn-icon btn-warning ms-1" ><i class="fas fa-pen"></i></a>
                  <form action="{{ url('transaksi',$item->id) }}" method="POST">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-icon btn-danger delete ms-1" data-name="{{ $item->menu_terjual }}"><i class="fas fa-trash"></i></button>
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