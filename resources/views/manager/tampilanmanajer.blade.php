@extends('layout')
@section('judul','Manajer')
@section('isi')

<div class="card">
    <div class="card-body" >
    <a style="padding: 30px 40px;" href="{{ url('manager/create') }}"class="btn btn-icon icon-left btn-primary mb-4"><span >Tambah</span></a>

    <table class="table table-hover table-bordered dataTable" id="barang-table">
            <thead style="font-size: 14px">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Manager</th>
                    <th scope="col">Alamat Manager</th>
                    <th scope="col">No Telepon</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="alldata">
              @foreach ( $manager as $item )
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item->nama_manager }}</td>                        
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->no_telp }}</td>
                <td style="display: flex">
                  <div class="dis d-flex">
                  <a href="{{ url('manager/'.$item->id.'/edit') }}" class="btn btn-icon btn-warning ms-1" ><i class="fas fa-pen"></i></a>
                  <form action="{{ url('manager',$item->id) }}" method="POST">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-icon btn-danger delete ms-1" data-name="{{ $item->nama_manager }}"><i class="fas fa-trash"></i></button>
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