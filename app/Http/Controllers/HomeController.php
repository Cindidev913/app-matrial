<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Supplier;
use App\Models\Penjualan;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $jumlah_barang = Barang::count();
        $jumlah_supplier = Supplier::count();
        $jumlah_penjualan = Penjualan::count();
        $jumlah_user = User::count();
        return view('home', compact('jumlah_barang', 'jumlah_supplier', 'jumlah_penjualan', 'jumlah_user'));



        // return view('home');
        // // }
    }
}
