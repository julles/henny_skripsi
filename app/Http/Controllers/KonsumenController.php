<?php

namespace App\Http\Controllers;

use App\konsumen;
use Illuminate\Http\Request;

class konsumenController extends Controller
{
    public function rules()
    {
        return [
            'nama'         => 'required|min:2|max:100',
            'kode'         => 'required|min:2|max:50|unique:konsumen,kode,' . request()->segment(3),
            'no_handphone' => 'required|min:11|max:30',
            'alamat'       => 'required',
        ];
    }

    public function getIndex()
    {
        $konsumen = konsumen::orderBy('id', 'desc')->get();

        return view('konsumen.index', [
            'konsumen' => $konsumen,
        ]);
    }

    public function getCreate()
    {
        return view('konsumen.form', [
            'model' => new konsumen(),
        ]);
    }

    public function postCreate(Request $request)
    {
        $this->validate($request, $this->rules());

        konsumen::create($request->all());

        return redirect('konsumen/index')->with('success', 'Data telah di simpan');
    }

    public function getUpdate($id)
    {
        $model = konsumen::findOrFail($id);

        return view('konsumen.form', [
            'model' => $model,
        ]);
    }

    public function postUpdate(Request $request, $id)
    {
        $this->validate($request, $this->rules());

        konsumen::findOrFail($id)->update($request->all());

        return redirect('konsumen/index')->with('success', 'Data telah di update');
    }

    public function getDelete($id)
    {

        try {
            $model = konsumen::findOrFail($id);

            $model->delete();

            return redirect('konsumen/index')->with('success', 'Data telah di hapus');
        } catch (\Exception $e) {
            return redirect('konsumen/index')->with('info', 'Data ini tidak bisa dihapus, karena masih digunakan oleh data lain!');
        }

    }
}
