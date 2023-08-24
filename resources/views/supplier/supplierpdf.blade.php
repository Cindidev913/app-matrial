<!DOCTYPE html>
<html>
<head>
	<title>Supplier</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Data Supplier</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Supplier</th>
				<th>No Telp</th>
				<th>Alamat</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($supplier as $item)
			<tr>
				<td>{{ $i++ }}</td>
				<td class="text-center">{{$item->nama_supplier}}</td>
                <td class="text-center">{{$item->no_telp}}</td>
                <td class="text-center">{{$item->alamat}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>