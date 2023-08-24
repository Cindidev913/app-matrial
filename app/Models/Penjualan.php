<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $table = "penjualan";

    public $fillable =
    [
        "id_penjualan",
        "id_barang",
        "nama_pembeli",
        "jumlah",
        "total_harga",
        "tanggal",
        "keterangan",
        "status",
    ];
    public $primaryKey = "id_barang";
}
