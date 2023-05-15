@extends('item.layout.template')
@section('content')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Back</a>
        </div>
        <div>
            <a href='{{ url('item/create') }}' class="btn btn-primary">+ Tambah Data</a>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-3">ID Item</th>
                <th class="col-md-4">Nama Item</th>
                <th class="col-md-2">Harga Item</th>
                <th class="col-md-2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = $data->firstItem() ?>
            @foreach ($data as $item)
            <tr>
                <td>{{$i}}</td>
                <td>{{$item->id_item}}</td>
                <td>{{$item->nama_item}}</td>
                <td>{{$item->harga_item}}</td>
                <td>
                    <a href='{{ url('item/'.$item->id_item.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                    <form onsubmit="return confirm('Yakin akan menghapus data ID {{$item->id_item}}?')" class="d-inline" action="{{ url('item/'.$item->id_item) }}" method="POST">
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
