@extends('layouts.app')
@section('content')
    @include('sweetalert::alert')
    <div class="container ">
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
        <div class="p-5 card btn btn-secondary">
            <h3 class="text-muted">
                <center>Data Supplier</center>
            </h3><br>
            <div class="form-group mb-3">
                <a type="button" href="{{ url('/supplier/create') }}" class="btn btn-success"><i
                        class="fas fa-plus-circle"></i> Supplier</a>
                <a type="button" href="{{ url('cetak_supplier') }}" class="btn btn-primary" target="_blank"><i
                        class="fas fa-download"></i> Supplier</a>
            </div>
            <table id="example" class="table table-striped cell-border" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Supplier</th>
                        <th class="text-center">No Telp</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($supplier as $item)
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td class="text-center">{{ $item->nama_supplier }}</td>
                            <td class="text-center">{{ $item->no_telp }}</td>
                            <td class="text-center">{{ $item->alamat }}</td>
                            <td class="text-center">

                                <a href="{{ route('supplier.edit', $item->id_supplier) }}" class="btn btn-primary"><i
                                        class="fas fa-pen-alt"></i></a>
                                <a href="{{ url('supplier/' . $item->id_supplier . '/delete') }}" class="btn btn-danger"><i
                                        class="far fa-times-circle"></i></a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
