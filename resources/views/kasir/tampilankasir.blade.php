@extends('layout')
@section('judul','Kasir')
@section('isi')

<div class="card">
    <div class="card-body" >
    <a style="padding: 30px 40px;" href="{{ url('kasir/create') }}"class="btn btn-icon icon-left btn-primary mb-4"><span >Tambah</span></a>

    <table class="table table-hover table-bordered dataTable" id="kasir-table">
            <thead style="font-size: 14px">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kasir</th>
                    <th scope="col">Alamat Kasir</th>
                    <th scope="col">No Telepon</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="alldata">
              @foreach ( $kasir as $item )
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item->nama_kasir }}</td>                        
                <td>{{ $item->alamat_kasir }}</td>
                <td>{{ $item->no_telp }}</td>
                <td style="display: flex">
                  <div class="dis d-flex">
                  <a href="{{ url('kasir/'.$item->id.'/edit') }}" class="btn btn-icon btn-warning ms-1" ><i class="fas fa-pen"></i></a>
                  <form action="{{ url('kasir',$item->id) }}" method="POST">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-icon btn-danger delete ms-1" data-name="{{ $item->nama_kasir }}"><i class="fas fa-trash"></i></button>
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