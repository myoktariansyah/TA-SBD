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
<h5 class="card-title fw-bolder mb-3">Tambah
Variasi pakan</h5>

<form method="post" action="{{

route('hewan.storepakan') }}">
@csrf
<div class="mb-3">

<label for="id_pakan" class="form-
label">ID pakan</label>

<input type="text" class="form-control"
id="id_pakan" name="id_pakan">
</div>

<div class="mb-3">

<label for="" class="form-
label">Nama pakan</label>

<input type="text" class="form-control"
id="nama_p" name="nama_p">
</div>
<div class="mb-3">

<label for="jenis_p" class="form-
label">Jenis pakan</label>

<input type="text" class="form-control"
id="jenis_p" name="jenis_p">
</div>

<div class="mb-3">

<div class="text-center">
<input type="submit" class="btn btn-primary" value="Tambah" />
</div>
</form>
</div>
</div>
@stop