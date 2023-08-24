@extends('layouts.app')
@section('content')
    @include('sweetalert::alert')

    <div class="container center">
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
                <center>Data Barang</center>
            </h3>
            <div class="form-group mb-3">
                <br>
                <div>
                    <a type="button" href="{{ url('/barang/create') }}" class="btn btn-success"><i
                            class="fas fa-plus-circle"></i> Barang</a>
                    <a type="button" href="{{ url('cetak_barang') }}" class="btn btn-primary" target="_blank"><i
                            class="fas fa-download"></i> Barang</a>
                </div>
                <br>
                <table id="example" class="table table-striped cell-border" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Barang</th>
                            <th class="text-center">Stok</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Satuan</th>
                            <th class="text-center">Supplier</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($barang as $item)
                            <tr>
                                <th class="text-center" scope="row"><?= $i++ ?></th>
                                <td>{{ $item->nama_barang }}</td>
                                <td class="text-center">{{ $item->stok }}</td>
                                <td class="text-center">Rp. {{ number_format($item->harga) }}</td>
                                <td class="text-center">{{ $item->satuan }}</td>
                                <td class="text-center">{{ $item->nama_supplier }}</td>
                                <td class="text-center">

                                    <a href="{{ route('barang.edit', $item->id_barang) }}" class="btn btn-primary"><i
                                            class="fas fa-pen-alt"></i></a>

                                    <a href="{{ url('barang/' . $item->id_barang . '/delete') }}"
                                        class="btn btn-danger "><i class="far fa-times-circle"></i></a>

                                    {{-- <a href="{{ url('barang/' . $item->id_barang . '/delete') }}" class="btn btn-danger"
                                        onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus data ini?'));
                                         {document.getElementById('delete-form-{{ $item->id_barang }}').submit();}">
                                        <i class="far fa-times-circle"></i>
                                    </a> --}}




                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
