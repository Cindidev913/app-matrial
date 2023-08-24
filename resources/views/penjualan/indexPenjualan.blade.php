@extends('layouts.app')
@section('content')
    @include('sweetalert::alert')
    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif
        <div class="card p-5 btn btn-secondary">
            <h3 class="text-muted">
                <center>Data Penjualan</center>
            </h3><br>
            <div class="form-group mb-3">
                <a href="{{ url('/penjualan/create') }}" class="btn btn-success"><i class="fas fa-plus-circle"></i>
                    Transaksi</a>
                <a href="{{ url('cetak_penjualan') }}" class="btn btn-primary" target="_blank"><i
                        class="fas fa-download"></i>
                    Transaksi</a>
            </div>

            <table id="example" class="table table-striped cell-border" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Pembeli</th>
                        <th class="text-center">Nama Barang</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Total Harga</th>
                        <th class="text-center">Tanggal </th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Status</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($penjualan as $item)
                        <tr>
                            <th class="text-center" scope="row"><?= $i++ ?></th>
                            <td>{{ $item->nama_pembeli }}</td>
                            <td>{{ $item->nama_barang }}</td>
                            <td class="text-center">{{ $item->jumlah }}</td>
                            <td class="text-center">Rp. {{ number_format($item->total_harga) }}</td>
                            <td class="text-center">{{ $item->tanggal }}</td>
                            <td class="text-center">{{ $item->keterangan }}</td>
                            <td class="text-center">{{ $item->status }}</td>

                            <td class="text-center">
                                <a href="{{ route('penjualan.edit', $item->id_penjualan) }}" class="btn btn-primary"><i
                                        class="fas fa-pen-alt"></i></a>

                                <a href="{{ url('penjualan/' . $item->id_penjualan . '/delete') }}"
                                    class="btn btn-danger"><i class="far fa-times-circle"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
