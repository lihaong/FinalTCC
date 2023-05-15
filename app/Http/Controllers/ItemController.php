<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ItemController extends Controller
{
    public function index()
    {
        $data = Item::orderBy('id_item', 'desc')->paginate(10);
        return view('item.index')->with('data', $data);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('item.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('id_item', $request->id_item);
        Session::flash('nama_item', $request->nama_item);
        Session::flash('harga_item', $request->harga_item);
        $request->validate([
            'id_item' => 'required|numeric|unique:item',
            'nama_item' => 'required',
            'harga_item' => 'required|numeric',
        ], [
            'id_item.required' => 'ID wajib diisi',
            'id_item.numeric' => 'ID wajib dalam angka',
            'id_item.unique' => 'ID yang diisikan sudah ada dalam database',
            'nama_item.required' => 'Nama wajib diisi',
            'harga_item.required' => 'Harga wajib diisi',
            'harga_item.numeric' => 'Harga wajib dalam angka',

        ]);
        $data = [
            'id_item' => $request->id_item,
            'nama_item' => $request->nama_item,
            'harga_item' => $request->harga_item,
        ];
        Item::create($data);
        return redirect()->to('item')->with('success', 'Berhasil menambahkan data');
    }
    /**
     * Display the specified resource.
     */
    public function show(Item $cr)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_item)
    {
        $data = Item::where('id_item', $id_item)->first();
        return view('item.edit')->with('data', $data);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_item)
    {
        $request->validate([
            'nama_item' => 'required',
            'harga_item' => 'required|numeric',
        ], [
            'nama_item.required' => 'Nama wajib diisi',
            'harga_item.required' => 'Harga wajib diisi',
            'harga_item.numeric' => 'Harga wajib dalam angka',
        ]);
        $data = [
            'nama_item' => $request->nama_item,
            'harga_item' => $request->harga_item,
        ];
        Item::where('id_item', $id_item)->update($data);
        return redirect()->to('item')->with('success', 'Berhasil memperbarui data');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_item)
    {
        Item::where('id_item', $id_item)->delete();
        return redirect()->to('item')->with('success', 'Berhasil menghapus data');
    }
}
