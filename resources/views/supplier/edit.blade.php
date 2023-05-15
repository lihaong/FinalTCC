
@extends('supplier.layout.template')
@section('content')
    <form action='{{ url('supplier/'.$data->id_supplier) }}' method='post'>
@csrf
@method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('supplier/') }}" class="btn btn-secondary  mb-5">Back</a>
        <div class="mb-3 row">
            <label for="id" class="col-sm-2 col-form-label">ID Supplier</label>
            <div class="col-sm-10">
                {{ $data->id_supplier }}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Supplier</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama_supplier' value="{{ $data->nama_supplier }}" id="nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat Supplier</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='alamat_supplier' value="{{ $data->alamat_supplier }}" id="alamat">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
@endsection
