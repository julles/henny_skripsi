<?php

namespace App\Http\Controllers;

use App\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function rules()
    {
        return [
            'satuan' => 'required|min:2|max:50|unique:satuan,satuan,' . request()->segment(3),
        ];
    }

    public function getIndex()
    {
        $satuan = Satuan::orderBy('id', 'desc')->get();

        return view('satuan.index', [
            'satuan' => $satuan,
        ]);
    }

    public function getCreate()
    {
        return view('satuan.form', [
            'model' => new Satuan(),
        ]);
    }

    public function postCreate(Request $request)
    {
        $this->validate($request, $this->rules());

        Satuan::create($request->all());

        return redirect('satuan/index')->with('success', 'Data telah di simpan');
    }

    public function getUpdate($id)
    {
        $model = Satuan::findOrFail($id);

        return view('satuan.form', [
            'model' => $model,
        ]);
    }

    public function postUpdate(Request $request, $id)
    {
        $this->validate($request, $this->rules());

        Satuan::findOrFail($id)->update($request->all());

        return redirect('satuan/index')->with('success', 'Data telah di update');
    }

    public function getDelete($id)
    {

        try {
            $model = Satuan::findOrFail($id);

            $model->delete();

            return redirect('satuan/index')->with('success', 'Data telah di hapus');
        }catch(\Exception $e) {
            return redirect('satuan/index')->with('info', 'Data ini tidak bisa dihapus, karena masih digunakan oleh data lain!');
        }

    }
}
