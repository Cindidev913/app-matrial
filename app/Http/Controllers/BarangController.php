<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Toast;
use PDF;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $barang = Barang::join('supplier', 'supplier.id_supplier', '=', 'barang.id_supplier')->paginate(5);

        return view('barang.indexBarang', compact('barang'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $c_supp = \DB::table('supplier')->get();
        return view('barang.manageBarang', compact('c_supp'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        unset($input['_token']);
        $status = \DB::table('barang')->insert($input);

        if ($status) {
            return redirect('barang')->with('success', "  Data Berhasil di Input");
        } else {
            return redirect('barang.create')->with('error', " data gagal di input");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        return view('barang.indexBarang', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        $c_supp = \DB::table('supplier')->get();
        return view('barang.editBarang', compact('barang', 'c_supp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    { {
            // $barang = \DB::table('barang')->where('id_barang',$id)->update([
            //     'nama_barang' => $request->nama_barang,
            //     'stok' => $request->stok,
            //     'harga' => $request->harga,
            //     'satuan' => $request->satuan,
            //     'id_supplier' => $request->id_supplier
            // ]);
            $request->validate([
                'nama_barang' => 'required',
                'stok' => 'required',
                'harga' => 'required',
                'satuan' => 'required',
                'id_supplier' => 'required',
            ]);

            $barang->update($request->all());
            if ($barang) {
                return redirect('barang')->with('success', " data berhasil di input");
            } else {
                return redirect('barang.edit')->with('error', " data gagal di input");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id_barang)
    {
        $result = \DB::table('barang')->where('id_barang', $id_barang)->delete();

        if ($result) return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        else return view('barang.indexBarang')->with('error', 'Data Gagal Dihapus');
    }

    public function cetak_pdf()
    {
        $barang = Barang::join('supplier', 'supplier.id_supplier', '=', 'barang.id_supplier')->paginate(5);
        // share data to view
        //view()->share('barang',$barang);
        $pdf = PDF::loadView('barang.barangpdf', array('barang' => $barang));
        // download PDF file with download method
        return $pdf->download('data_barang.pdf');
    }
}
