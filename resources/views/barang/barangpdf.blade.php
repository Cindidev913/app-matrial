<!DOCTYPE html>
<html>
<head>
	<title>Barang</title>
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
		<h5>Data Barang</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Barang</th>
				<th>Stok</th>
				<th>Harga</th>
				<th>Satuan</th>
				<th>Supplier</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($barang as $item)
			<tr>
				<td>{{ $i++ }}</td>
				<td class="text-center">{{$item->nama_barang}}</td>
                <td class="text-center">{{$item->stok}}</td>
                <td class="text-center">Rp. {{ number_format($item->harga) }}</td>
                <td class="text-center">{{$item->satuan}}</td>
                <td class="text-center">{{$item->nama_supplier}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>