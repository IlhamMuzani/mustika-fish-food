<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suplayer;
use Illuminate\Support\Facades\Validator;

class SuplayerController extends Controller
{
    public function index(Request $request)
    {
        $suplayers = Suplayer::paginate(3);
        $filterKeyword = $request->get('keyword');
        if ($filterKeyword) {
            //dijalankan jika ada pencarian
            $suplayers = Suplayer::where('nama', 'LIKE', "%$filterKeyword%")->paginate(2);
        }
        return view('admin/suplayer.index', compact('suplayers'));
    }

    public function create()
    {
        return view('admin/suplayer.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'alamat' => 'required'
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong !',
                'alamat.required' => 'Alamat tidak boleh kosong !'
            ]
        );

        if ($validator->failed()) {
            $errors = $validator->errors()->all();
            return back()->withInput()->with('status', $errors);
        }

        Suplayer::create($request->all());
        return redirect('admin/suplayer')->with('status', 'Berhasil menambahkan suplayer');
    }

    public function show($id)
    {
        $suplayers = Suplayer::whrare ('id', $id)->first();

        return view('admin/suplayer.index', compact('suplayers'));
    }

    
    public function edit($id)
    {
        $suplayers = Suplayer::where('id', $id)->first();
        return view('admin/suplayer.edit', compact('suplayers'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
        [
            'nama' => 'required',
            'alamat' => 'required'
        ],
        [   
            'nama.required' => 'Nama tidak boleh Kosong',
            'alamat.required' => 'Alamat tidak boleh Kosong',
        ]);

        if($validator->fails()){
            $error = $validator->errors()->all();
            return back()->withInput()->with('status', $error);
            
        }
        
        Suplayer::where('id', $id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);

        return redirect('admin/suplayer')->with('status', 'Berhasil mengubah suplayer');
    }

    public function destroy($id)
    {
        $suplayer = Suplayer::find($id);
        $suplayer->delete();

        return redirect('admin/suplayer')->with('status', 'Berhasil menghapus suplayer');
    }
}