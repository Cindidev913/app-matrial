@extends('layouts.app')

@section('content')
<!doctype html>
<html>
    <head>
        <title>Penjualan</title>
    </head>
    <body>
        <div class="container">
            <div class="col-sm-7">
        <div class="card bg-secondary text-white mt-5">
                <div class="card-header text-center">
                    <h5>Manage Penjualan</h5>
                </div>
                <div class="card-body">
                    <br/>
                    
                    <form method="post" action="{{ route('penjualan.store') }}">
 
                        {{ csrf_field() }}
                        <input class="" type="number" name="id_penjualan" value="{{ old('id_penjualan', @$penjualan->id_penjualan) }}" hidden>
                        <div class="form-group">
                            <label for="nama_pembeli" class="form-label">Nama Pembeli</label>
                            <input class="form-control" type="text" name="nama_pembeli" value="{{ old('nama_pembeli', @$penjualan->nama_pembeli) }}" placeholder="Nama Pembeli" >
                        </div>
                        <div class="form-group">
                            <label for="id_barang" class="form-label">Nama Barang</label>
                            <select class="form-select select2 btn btn-dark" name="id_barang" id="id_barang">
                            @foreach($c_bar as $bar)
                                <option value="{{$bar->id_barang}}">{{$bar->nama_barang}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input class="form-control" type="number" name="jumlah" value="{{ old('jumlah', @$penjualan->jumlah) }}" placeholder="Jumlah Beli">
                        </div>
                        <!-- <div class="form-group">
                            <label>Total</label>
                            <input class="form-control" type="number" name="total_harga" value="{{ old('total_harga', @$penjualan->total_harga) }}" placeholder="Harga" >
                        </div> -->
                        <input name="tanggal" type="timestamp" value="<?php echo date('Y-m-d H:i:s'); ?>" hidden/>
                        <div class="form-group">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input class="form-control" type="text" name="keterangan" value="{{ old('keterangan', @$penjualan->keterangan) }}" placeholder="Keterangan (Opsional)" >
                        </div>
                        <div class="form-group">
                            <label for="status" class="form-label">Status</label>
                            <input class="form-control" type="text" name="status" value="{{ old('status', @$penjualan->status) }}" placeholder="Status (Opsional)" >
                        </div>
                        <div class="form-group mt-3">
                        <button type="submit" class="btn btn-danger me-2">Simpan</button>
                        <a href="{{ route('penjualan.index') }}" class="btn btn-success">Batal</a>
                    </div>
                    </div>
                    </form>
 
                </div>
            </div>
        </div>
    </body>
</html>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
$('.select2').select2();
</script>
@endsection