<!DOCTYPE html>
<html>
<head>
	<title>Penjualan</title>
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
		<h5>Data Penjualan</h4>
	</center>
 
	<table class='table table-bordered'>
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
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($penjualan as $item)
			<tr>
				<td>{{ $i++ }}</td>
				<td class="text-center">{{$item->nama_pembeli}}</td>
                <td class="text-center">{{$item->nama_barang}}</td>
                <td class="text-center">{{$item->jumlah}}</td>
                <td class="text-center">Rp. {{ number_format($item->total_harga) }}</td>
                <td class="text-center">{{$item->tanggal}}</td>
                <td class="text-center">{{$item->keterangan}}</td>
                <td class="text-center">{{$item->status}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>