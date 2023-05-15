@extends('layout.template')

@section('title', 'Inventory System')

@section('content')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h1>Selamat Datang di Aplikasi Inventory Management System</h1>
        <p>Pilihan Menu:</p>
        <div class="d-flex justify-content-between">
            <div class="btn-group">
                <a href="{{ url('supplier') }}" class="btn btn-outline-primary btn-lg">Supplier</a>
            </div>
            <div class="btn-group">
                <a href="{{ url('item') }}" class="btn btn-outline-success btn-lg">Item</a>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .btn-group>.btn {
            flex: 1;
            margin-right: 5px;
        }
    </style>
@endsection
