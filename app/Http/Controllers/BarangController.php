<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Satuan;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function rules()
    {
        return [
            'kode'        => 'required|min:2|max:50|unique:barang,kode,' . request()->segment(3),
            'nama'        => 'required|min:2|max:225',
            'harga_modal' => 'required|numeric|min:100|max:99999999999',
            'harga_jual'  => 'required|numeric|min:'.request()->get('harga_modal').'|max:99999999999',
        ];
    }

    public function satuan()
    {
        return Satuan::pluck('satuan', 'id');
    }

    public function getIndex()
    {
        $barang = Barang::with('satuan')->orderBy('id', 'desc')->get();

        return view('barang.index', [
            'barang' => $barang,
        ]);
    }

    public function getCreate()
    {
        return view('barang.form', [
            'model'  => new Barang(),
            'satuan' => $this->satuan(),
        ]);
    }

    public function postCreate(Request $request)
    {
        $this->validate($request, $this->rules());

        Barang::create($request->all());

        return redirect('barang/index')->with('success', 'Data telah di simpan');
    }

    public function getUpdate($id)
    {
        $model = Barang::findOrFail($id);

        return view('barang.form', [
            'model'  => $model,
            'satuan' => $this->satuan(),
        ]);
    }

    public function postUpdate(Request $request, $id)
    {
        $this->validate($request, $this->rules());

        Barang::findOrFail($id)->update($request->all());

        return redirect('barang/index')->with('success', 'Data telah di update');
    }

    public function getDelete($id)
    {

        try {
            $model = Barang::findOrFail($id);

            $model->delete();

            return redirect('barang/index')->with('success', 'Data telah di hapus');
        } catch (\Exception $e) {
            return redirect('barang/index')->with('info', 'Data ini tidak bisa dihapus, karena masih digunakan oleh data lain!');
        }

    }
}
