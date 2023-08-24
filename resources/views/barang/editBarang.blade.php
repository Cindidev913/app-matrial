@extends('layouts.app')

@section('content')
<!doctype html>
<html>
    <head>
        
        <title>barang</title>
    </head>
    <body>
        <div class="container">
        <div class="col-sm-7">
            <div class="card bg-secondary text-white mt-5">
                <div class="card-header text-center">
                    <h5>Edit Barang</h5>
                </div>
                <div class="card-body">
                    <br/>
                    
                    <form method="post" action="{{ route('barang.update',$barang->id_barang) }}">
 
                        {{ csrf_field() }}
                        @method('PUT')
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
                            <input class="form-control" type="text" name="satuan" value="{{ old('satuan', @$barang->satuan) }}" placeholder="Satuan" >
                            
                        </div>
                        <div class="form-group">
                            <label>Supplier</label>
                            <select class="form-select" name="id_supplier">
                                @foreach($c_supp as $row)
                                    <option value="{{ $row->id_supplier }}" {{$barang->id_supplier == $row->id_supplier  ? 'selected' : ''}}>{{ $row->nama_supplier}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                        <button type="submit" class="btn btn-danger me-2">Simpan</button>
                        <a href="{{ route('barang.index') }}" class="btn btn-info">Batal</a>
                    </div>
 
                    </form>
 
                </div>
            </div>
        </div>
    </body>
</html>
@endsection