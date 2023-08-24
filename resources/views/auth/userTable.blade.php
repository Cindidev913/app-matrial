@extends('layouts.app')
@section('content')
<div class="container">
<div class="p-5 card btn btn-secondary">
        <h3 class="text-muted"><center>Data Pengguna</center></h3><br>
        <div>
            <a href="{{ url('/users/create')}}" class="btn btn-success"><i class="fas fa-user-plus"></i>&nbsp Users</a>
            </div>
            <br> 
            <table id="example" class="table table-striped cell-border" style="width:100%">
                    <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1; 
                        @endphp
                        @foreach ($users as $item)
                            <tr>
                                <th class="text-center" scope="row"><?= $i++; ?></th>
                                <td>{{$item->name}}</td>
                                <td class="text-center">{{$item->email}}</td>
                                <td class="text-center">
                                <a href="{{ route('users.edit',$item->id) }}" class="btn btn-primary"><i class="fas fa-pen-alt"></i></a>
                                    
                                <a href="{{ url('users/' . $item->id .'/delete')}}" class="btn btn-danger"><i class="far fa-times-circle"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
