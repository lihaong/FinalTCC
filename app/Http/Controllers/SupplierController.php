<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Supplier::orderBy('id_supplier', 'desc')->paginate(10);
        return view('supplier.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('id_supplier', $request->id_supplier);
        Session::flash('nama_supplier', $request->nama_supplier);
        Session::flash('alamat_supplier', $request->alamat_supplier);

        $request->validate([
            'id_supplier' => 'required|numeric|unique:supplier',
            'nama_supplier' => 'required',
            'alamat_supplier' => 'required',
        ], [
            'id_supplier.required' => 'ID wajib diisi',
            'id_supplier.numeric' => 'ID wajib dalam angka',
            'id_supplier.unique' => 'ID yang diisikan sudah ada dalam database',
            'nama_supplier.required' => 'Nama wajib diisi',
            'alamat_supplier.required' => 'Alamat wajib diisi',
        ]);
        $data = [
            'id_supplier' => $request->id_supplier,
            'nama_supplier' => $request->nama_supplier,
            'alamat_supplier' => $request->alamat_supplier,
        ];
        Supplier::create($data);
        return redirect()->to('supplier')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $cr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_supplier)
    {
        $data = Supplier::where('id_supplier', $id_supplier)->first();
        return view('supplier.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_supplier)
    {
        $request->validate([
            'nama_supplier' => 'required',
            'alamat_supplier' => 'required',
        ], [
            'nama_supplier.required' => 'Nama wajib diisi',
            'alamat_supplier.required' => 'Alamat wajib diisi',
        ]);
        $data = [
            'nama_supplier' => $request->nama_supplier,
            'alamat_supplier' => $request->alamat_supplier,
        ];
        Supplier::where('id_supplier', $id_supplier)->update($data);
        return redirect()->to('supplier')->with('success', 'Berhasil memperbarui data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_supplier)
    {
        Supplier::where('id_supplier', $id_supplier)->delete();
        return redirect()->to('supplier')->with('success', 'Berhasil menghapus data');
    }
}
