@extends('layout')
@section('judul','Menu')
@section('isi')

<div class="card">
    <div class="card-body" >
    <a style="padding: 10px 20px;" href="{{ url('menu/create') }}"class="btn icon-left btn-primary mb-4"><span >Tambah</span></a>

    <table class="table table-hover table-bordered dataTable" id="barang-table">
            <thead style="font-size: 14px">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Daftar Menu</th>
                    <th scope="col">Harga Menu</th>
                    <th scope="col">Stock Menu</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="alldata">
              @foreach ( $menu as $item )
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item->daftar_menu }}</td>                        
                <td>{{ $item->harga_menu }}</td>
                <td>{{ $item->stock_menu }}</td>
                <td style="display: flex">
                  <div class="dis d-flex">
                  <a href="{{ url('menu/'.$item->id.'/edit') }}" class="btn btn-icon btn-warning ms-1 mr-1" ><i class="fas fa-pen"></i></a>
                  <form action="{{ url('menu',$item->id) }}" method="POST">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-icon btn-danger delete ms-1" data-name="{{ $item->daftar_menu }}"><i class="fas fa-trash"></i></button>
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