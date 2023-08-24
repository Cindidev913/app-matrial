<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Barang;
use Illuminate\Http\Request;
use PDF;
class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $penjualan = Penjualan::join('barang', 'barang.id_barang', '=', 'penjualan.id_barang')->paginate(5);
        
        return view('penjualan.indexPenjualan',compact('penjualan'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $c_bar = \DB::table('barang')->get();
        return view ('penjualan.managePenjualan', compact('c_bar'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'id_barang'=>'required',
    		'nama_pembeli'=>'required',
            'jumlah'=>'required',
            'keterangan',
    		'status'
    	]);

        $penjualan['id_barang'] = $request->id_barang;
    	$penjualan['nama_pembeli'] = $request->nama_pembeli;
    	$penjualan['jumlah'] = $request->jumlah;
        $penjualan['tanggal'] = $request->tanggal;
        $penjualan['keterangan'] = $request->keterangan;
        $penjualan['status'] = $request->status;

        $harga = Barang::find($request->id_barang);
        $harga_brg = $harga->harga;
        $jumlah = $request->jumlah;
        $harga_total = $harga_brg * $jumlah;
        $penjualan['total_harga'] = $harga_total;

        $status =\DB::table('penjualan')->insert($penjualan);

        if($status){
            return redirect('penjualan')->with('success', " data berhasil di input");
        }else{
            return redirect('penjualan.create')->with('error', " data gagal di input");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjualan $penjualan)
    {
        $c_bar = \DB::table('barang')->get();
        return view ('penjualan.editPenjualan', compact('penjualan','c_bar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id_penjualan)
    {
        $result = \DB::table('penjualan')->where('id_penjualan', $id_penjualan)->delete();

        if($result) return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        else return view('barang.indexBarang')->with('error', 'Data Gagal Dihapus');
    }

    public function cetak_pdf()
    {
    	$penjualan = Penjualan::join('barang', 'barang.id_barang', '=', 'penjualan.id_barang')->paginate(5);
        // share data to view
        //view()->share('barang',$barang);
        $pdf = PDF::loadView('penjualan.penjualanpdf', array('penjualan' => $penjualan) );
        // download PDF file with download method
        return $pdf->download('data_penjualan.pdf');
    }
}
