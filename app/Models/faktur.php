<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = "faktur";

    public $fillable =
    [
        "id_barang",
        "nama_barang",
        "stok",
        "harga",
        "satuan",
        "id_supplier",
    ];
    public $primaryKey = "id_faktur";
}
