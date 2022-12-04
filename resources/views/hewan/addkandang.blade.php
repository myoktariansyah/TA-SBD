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
Variasi Kandang</h5>

<form method="post" action="{{

route('hewan.storekandang') }}">
@csrf
<div class="mb-3">

<label for="id_kandang" class="form-
label">ID Kandang</label>

<input type="text" class="form-control"
id="id_kandang" name="id_kandang">
</div>

<div class="mb-3">

<label for="jenis_k" class="form-
label">Jenis Kandang</label>

<input type="text" class="form-control"
id="jenis_k" name="jenis_k">
</div>
<div class="mb-3">

<label for="tipe_k" class="form-
label">Tipe Kandang</label>

<input type="text" class="form-control"
id="tipe_k" name="tipe_k">
</div>
<div class="mb-3">

<label for="kapasitas" class="form-
label">Kapasitas</label>

<input type="text" class="form-control"
id="kapasitas" name="kapasitas">
</div>
<div class="mb-3">

<div class="text-center">
<input type="submit" class="btn btn-primary" value="Tambah" />
</div>
</form>
</div>
</div>
@stop