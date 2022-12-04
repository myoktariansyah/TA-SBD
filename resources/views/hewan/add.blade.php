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
hewan</h5>

<form method="post" action="{{

route('hewan.store') }}">
@csrf
<div class="mb-3">

<label for="id_hewan" class="form-
label">ID hewan</label>

<input type="text" class="form-control"
id="id_hewan" name="id_hewan">
</div>

<div class="mb-3">

<label for="nama" class="form-
label">Nama hewan</label>

<input type="text" class="form-control"
id="nama" name="nama">
</div>
<div class="mb-3">

<label for="spesies" class="form-
label">Spesies</label>

<input type="text" class="form-control"
id="spesies" name="spesies">
</div>
<div class="mb-3">

<label for="klasifikasi" class="form-
label">Klasifikasi</label>

<input type="text" class="form-control"
id="klasifikasi" name="klasifikasi">
</div>
<div class="mb-3">

<label for="id_kandang" class="form-
label">ID Kandang</label>

<input type="text" class="form-control"
id="id_kandang" name="id_kandang">
</div>
<div class="mb-3">

<label for="id_pakan" class="form-
label">ID Pakan</label>

<input type="text" class="form-control"
id="id_pakan" name="id_pakan">
</div>

<div class="text-center">
<input type="submit" class="btn

btn-primary" value="Tambah" />
</div>
</form>
</div>
</div>
@stop