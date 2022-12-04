@extends('hewan.layout')
@section('content')
<h4 class="mt-5">Data Pakan</h4>
<a href="{{ route('hewan.createpakan') }}" type="button"
class="btn btn-success rounded-3">Tambah Jenis Pakan</a>
@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
{{ $message }}
</div>
@endif
<table class="table table-hover mt-2">
<thead>
<tr>
<th>No.</th>
<th>Nama Pakan</th>
<th>Jenis Pakan</th>
</tr>
</thead>
<tbody>
@foreach ($datas as $data)

<tr>
<td>{{ $data->id_pakan }}</td>
<td>{{ $data->nama_p }}</td>
<td>{{ $data->jenis_p }}</td>
<td>
<a href="{{ route('hewan.editpakan', $data->id_pakan) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>

<!-- TAMBAHKAN KODE DELETE DIBAWAH BARIS INI -->
<!-- Button trigger modal -->

<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_pakan }}">
    Hapus
</button>
<!-- Modal -->
<div class="modal fade" id="hapusModal{{ $data->id_pakan }}" tabindex="-1"
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
action="{{ route('hewan.deletepakan', $data->id_pakan) }}">
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