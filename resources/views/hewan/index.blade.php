@extends('hewan.layout')
@section('content')
<h3 class="mt-5">Data Hewan</h3>
<a href="{{ route('hewan.create') }}" type="button"
class="btn btn-success rounded-3">Tambah Hewan</a>
<a href="{{ route('hewan.kandang') }}" type="button"
class="btn btn-success rounded-3">Tabel Kandang</a>
<a href="{{ route('hewan.pakan') }}" type="button"
class="btn btn-success rounded-3">Tabel Pakan</a>
<a href="{{ route('hewan.trash') }}" type="button"
class="btn btn-dark rounded-3" >Trash</a>
<a href="{{ url('/') }}" type="button"
class="btn btn-info rounded-3" >Login page</a>
<form class = "row mt-3 ml-3 justify-content-center; "action="" method="GET">
        <h4 class="text-center mb-1">Search</h4>
        <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
        <input type="text" name="search" required/>
        
        <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
    </form>
@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
{{ $message }}
</div>
@endif
<table class="table table-hover mt-2">
<thead>
<tr>
<th>No.</th>
<th>Nama</th>
<th>Spesies</th>
<th>Klasifikasi</th>
<th>kandang</th>
<th>pakan</th>
</tr>
</thead>
<tbody>
@foreach ($datas as $data)

<tr>
<td>{{ $data->id_hewan }}</td>
<td>{{ $data->nama }}</td>
<td>{{ $data->spesies }}</td>
<td>{{ $data->klasifikasi }}</td>
<td>{{ $data->jenis_k }}</td>
<td>{{ $data->nama_p }}</td>
<td>
<a href="{{ route('hewan.edit', $data->id_hewan) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>

<!-- TAMBAHKAN KODE DELETE DIBAWAH BARIS INI -->
<!-- Button trigger modal -->

<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_hewan }}">
    Hapus
</button>
<!-- Modal -->
<div class="modal fade" id="hapusModal{{ $data->id_hewan }}" tabindex="-1"
aria-labelledby="hapusModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">

<div class="modal-header">

<h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>

<button
type="button" class="btn-close" data-bs-dismiss="modal"aria-label="Close">
</button>
</div>

<form method="POST"
action="{{ route('hewan.softdelete', $data->id_hewan) }}">
@csrf

<div class="modal-
body">

Apakah anda
yakin ingin menghapus data ini?
</div>

<div class="modal-
footer">

<button

type="button" class="btn btn-secondary" data-bs-
dismiss="modal">Tutup</button>

<button
type="submit" class="btn btn-primary">Ya</button>
</div>
</form>
</div>
</div>
</div>
</td>
</tr>
@endforeach
</tbody>
</table>
@stop