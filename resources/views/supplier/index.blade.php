@extends('supplier.layout.template')
@section('content')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Back</a>
        </div>
        <div>
            <a href='{{ url('supplier/create') }}' class="btn btn-primary">+ Tambah Data</a>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-3">ID Supplier</th>
                <th class="col-md-4">Nama Supplier</th>
                <th class="col-md-2">Alamat Supplier</th>
                <th class="col-md-2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = $data->firstItem() ?>
            @foreach ($data as $item)
            <tr>
                <td>{{$i}}</td>
                <td>{{$item->id_supplier}}</td>
                <td>{{$item->nama_supplier}}</td>
                <td>{{$item->alamat_supplier}}</td>
                <td>
                    <a href='{{ url('supplier/'.$item->id_supplier.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                    <form onsubmit="return confirm('Yakin akan menghapus data ID {{$item->id_supplier}}?')" class="d-inline" action="{{ url('supplier/'.$item->id_supplier) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                    </form>
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
