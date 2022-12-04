@extends('produk.layout')

@section('content')

<h4 class="mt-5">Riwayat</h4>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<form action="">
<div class="input-group mb-3">
  <input name="search" type="text" class="form-control" placeholder="search" aria-label="search" aria-describedby="button-addon2">
  <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
</div>
</form>

<table class="table table-hover mt-2">
    <thead>
      <tr>
      <th>Id Pembeli</th>
        <th>Id Alat</th>
        <th>Nama Alat</th>
        <th>Nama_Produk</th>
        <th>Jenis Biji</th>
        <th>Kuantiti </th>
        <th>harga</th>
        <th>Total</th>
        <th>Tanggal</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->id_pembeli }}</td>
                <td>{{ $data->id_alat }}</td>
                <td>{{ $data->nama_alat }}</td>
                <td>{{ $data->nama_produk }}</td>
                <td>{{ $data->jenis_biji }}</td>
                <td>{{ $data->kuantiti }}</td>
                <td>{{ $data->harga }}</td>
                <td>{{ $data->total }}</td>
                <td>{{ $data->tanggal }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop