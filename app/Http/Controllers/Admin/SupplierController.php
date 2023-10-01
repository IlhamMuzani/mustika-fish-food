<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::get();

        return view('admin.supplier.index', compact('suppliers'));
    }

    public function create()
    {
        return view('admin.supplier.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required'
        ], [
            'nama.required' => 'Nama Supplier tidak boleh kosong !',
            'alamat.required' => 'Alamat tidak boleh kosong !'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return back()->withInput()->with('error', $errors);
        }

        Supplier::create($request->all());

        return redirect('admin/supplier')->with('success', 'Berhasil menambahkan Supplier');
    }

    public function show($id)
    {
        // 
    }

    public function edit($id)
    {
        $supplier = Supplier::where('id', $id)->first();

        return view('admin.supplier.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required'
        ], [
            'nama.required' => 'Nama tidak boleh Kosong',
            'alamat.required' => 'Alamat tidak boleh Kosong',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        Supplier::where('id', $id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);

        return redirect('admin/supplier')->with('success', 'Berhasil mengubah Supplier');
    }

    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->produk()->delete();
        $supplier->delete();

        return redirect('admin/supplier')->with('success', 'Berhasil menghapus Supplier');
    }
}