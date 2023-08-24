@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card p-5">
    <h3><center>Data Barang</center></h3><br>
        <a href="{{ url('/barang/create')}}" class="btn btn-success">Tambah Barang</a>
        <br>
        <table id="example" class="table table-striped" style="width:100%">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Id faktur</th>
                    <th class="text-center">Id pembeli</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Satuan</th>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Total Barang</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                     $i = 1; 
                    @endphp
                    @foreach ($barang as $item)
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td class="text-center">{{$item->nama_barang}}</td>
                            <td class="text-center">{{$item->stok}}</td>
                            <td class="text-center">{{$item->harga}}</td>
                            <td class="text-center">{{$item->satuan}}</td>
                            <td class="text-center">{{$item->nama_supplier}}</td>
                            <td class="text-center">
                        
                                <a href="{{ route('barang.edit',$item->id_barang) }}" class="btn btn-primary">Edit</a>
                                
                                
                                <a href="{{ url('barang/' . $item->id_barang .'/delete')}}" class="btn btn-danger">Delete</a>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>

@endsection
