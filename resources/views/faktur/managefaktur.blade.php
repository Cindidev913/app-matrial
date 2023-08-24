@extends('layouts.app')

@section('content')
<!doctype html>
<html>
    <head>
        
        <title>barang</title>
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    Manage barang 
                </div>
                <div class="card-body">
                    <br/>
                    
                    <form method="post" action="{{ route('barang.store') }}">
 
                        {{ csrf_field() }}
                        <input class="" type="number" name="id_barang" value="{{ old('id_barang', @$barang->id_barang) }}" hidden>
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input class="form-control" type="text" name="nama_barang" value="{{ old('nama_barang', @$barang->nama_barang) }}" placeholder="Nama Barang">
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <input class="form-control" type="number" name="stok" value="{{ old('stok', @$barang->stok) }}" placeholder="Stok">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input class="form-control" type="number" name="harga" value="{{ old('harga', @$barang->harga) }}" placeholder="Harga" >
                        </div>
                        <div class="form-group">
                            <label>Satuan</label>
                            <input class="form-control" type="text" name="satuan" value="{{ old('satuan', @$barang->satuan) }}" placeholder="Satuan (Contoh : Kilo Gram / Unit)" >
                            
                        </div>
                        <div class="form-group">
                            <label>Supplier</label>
                            <select class="form-select" name="id_supplier" id="id_supplier">
                            @foreach($c_supp as $sup)
                                <option value="{{$sup->id_supplier}}">{{$sup->nama_supplier}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <input type="submit" class="btn btn-success" value="Simpan">
                        </div>
 
                    </form>
 
                </div>
            </div>
        </div>
    </body>
</html>
@endsection