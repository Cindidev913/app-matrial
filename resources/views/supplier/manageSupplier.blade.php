@extends('layouts.app')

@section('content')
<!doctype html>
<html>
    <head>
        
        <title>Supplier</title>
    </head>
    <body>
        <div class="container">
        <div class="col-sm-7">
        <div class="card bg-secondary text-white mt-5">
                <div class="card-header text-center">
                   <h5>Manage Supplier</h5>
                </div>
                <div class="card-body">
                    <br/>
                    
                    <form method="post" action="{{ route('supplier.store') }}">
 
                        {{ csrf_field() }}
                        <input class="" type="number" name="id_supplier" value="{{ old('id_supplier', @$supplier->id_supplier) }}" hidden>
                        <div class="form-group">
                            <label for="nama_supplier" class="form-label">Nama Supplier</label>
                            <input class="form-control" type="text" name="nama_supplier" value="{{ old('nama_supplier', @$supplier->nama_supplier) }}" placeholder="Nama Supplier">
                        </div>
                        <div class="form-group">
                            <label for="no_telp" class="form-label">No Telpon</label>
                            <input class="form-control" type="number" name="no_telp" value="{{ old('stok', @$supplier->no_telp) }}" placeholder="No Telpon">
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input class="form-control" type="text" name="alamat" value="{{ old('alamat', @$supplier->alamat) }}" placeholder="Alamat" >
                        </div>
                        <div class="form-group mt-3">
                        <button type="submit" class="btn btn-danger me-2">Simpan</button>
                        <a href="{{ route('supplier.index') }}" class="btn btn-success">Batal</a>
                    </div>
</div>
                    </form>
 
                </div>
            </div>
        </div>
    </body>
</html>
@endsection