
@extends('item.layout.template')
@section('content')
    <form action='{{ url('item/'.$data->id_item) }}' method='post'>
@csrf
@method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('item/') }}" class="btn btn-secondary  mb-5">Back</a>
        <div class="mb-3 row">
            <label for="id" class="col-sm-2 col-form-label">ID Item</label>
            <div class="col-sm-10">
                {{ $data->id_item }}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Item</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama_item' value="{{ $data->nama_item }}" id="nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="harga" class="col-sm-2 col-form-label">Harga Item</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='harga_item' value="{{ $data->harga_item }}" id="harga">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
@endsection
