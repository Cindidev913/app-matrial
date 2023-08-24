<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $supplier = Supplier::latest()->paginate(5);

        return view('supplier.indexSupplier', compact('supplier'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('supplier.manageSupplier');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        unset($input['_token']);
        $status = \DB::table('supplier')->insert($input);

        if ($status) {
            return redirect('supplier')->with('success', " Data Berhasil di Input");
        } else {
            return redirect('supplier.create')->with('error', " Data Gagal di Input");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
        return view('supplier.indexSupplier', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        //
        return view('supplier.editSupplier', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
        $request->validate([
            'nama_supplier' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',

        ]);

        $supplier->update($request->all());
        if ($supplier) {
            return redirect('supplier')->with('success', " data berhasil di input");
        } else {
            return redirect('supplier.edit')->with('error', " data gagal di input");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier, $id_supplier)
    {
        //
        $result = \DB::table('supplier')->where('id_supplier', $id_supplier)->delete();

        if ($result) return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        else return view('supplier.indexSupplier')->with('error', 'Data Gagal Dihapus');
    }

    public function cetak_pdf()
    {
        $supplier = Supplier::latest()->paginate(5);
        // share data to view
        //view()->share('barang',$barang);
        $pdf = PDF::loadView('supplier.supplierpdf', array('supplier' => $supplier));
        // download PDF file with download method
        return $pdf->download('data_supplier.pdf');
    }
}
