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
            <div class="card bg-dark text-white mt-5">
                <div class="card-header text-center">
                   <h3>Manage Barang</h3> 
                </div>
                <div class="card-body">
                    <br/>
                    <form method="post" action="{{ route('barang.store') }}">
 
                        {{ csrf_field() }}
                        <input class="" type="number" name="id_barang" value="{{ old('id_barang', @$barang->id_barang) }}" hidden>
                        <div class="form-group">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input class="form-control" type="text" name="nama_barang" value="{{ old('nama_barang', @$barang->nama_barang) }}" placeholder="Nama Barang">
                        </div>
                        <div class="form-group">
                            <label for="stok" class="form-label">Stok</label>
                            <input class="form-control" type="number" name="stok" value="{{ old('stok', @$barang->stok) }}" placeholder="Stok">
                        </div>
                        <div class="form-group">
                            <label for="harga" class="form-label">Harga</label>
                            <input class="form-control" type="number" name="harga" value="{{ old('harga', @$barang->harga) }}" placeholder="Harga" >
                        </div>
                        <div class="form-group">
                            <labelfor="satuan" class="form-label">Satuan</label>
                            <input class="form-control" type="text" name="satuan" value="{{ old('satuan', @$barang->satuan) }}" placeholder="Satuan (Contoh : Kilo Gram / Unit)" >
                            
                        </div>
                        <div class="form-group">
                            <labelfor="id_supplier" class="form-label">Supplier</label>
                            <select class="form-select select2" name="id_supplier" id="id_supplier">
                            @foreach($c_supp as $sup)
                                <option value="{{$sup->id_supplier}}">{{$sup->nama_supplier}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                        <button type="submit" class="btn btn-danger me-2">Simpan</button>
                        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Batal</a>
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