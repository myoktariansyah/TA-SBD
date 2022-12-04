@extends('hewan.layout')
@section('content')
@if($errors->any())
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<div class="card mt-4">
<div class="card-body">
<h5 class="card-title fw-bolder mb-3">Ubah Data Pakan</h5>

<form method="post" action="{{
route('hewan.updatepakan', $data->id_pakan) }}">

@csrf
<div class="mb-3">
<label for="id_pakan" class="form-label">ID Pakan</label>
<input type="text" class="form-control" id="id_pakan" name="id_pakan" value="{{ $data->id_pakan}}">
</div>

<div class="mb-3">
<label for="nama_p" class="form-label">Nama Pakan</label>
<input type="text" class="form-control"id="nama_p" name="nama_p" value="{{ $data->nama_p }}">
</div>
<div class="mb-3">

<label for="jenis_p" class="form-label">Jenis pakan</label>
<input type="text" class="form-control"
id="jenis_p" name="jenis_p" value="{{ $data->jenis_p }}">
</div>


<div class="text-center">
<input type="submit" class="btn

btn-primary" value="Ubah" />
</div>
</form>
</div>
</div>
@stop