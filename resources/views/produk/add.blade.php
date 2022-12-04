@extends('produk.layout')

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

        <h5 class="card-title fw-bolder mb-3">Tambah produk</h5>

		<form method="post" action="{{ route('produk.store') }}">
			@csrf
            <div class="mb-3">
                <label for="id_produk" class="form-label">ID produk</label>
                <input type="text" class="form-control" id="id_produk" name="id_produk">
            </div>
			<div class="mb-3">
                <label for="nama_produk" class="form-label">Nama_Produk</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk">
            </div>
            <div class="mb-3">
                <label for="jenis_biji" class="form-label">Jenis_Biji</label>
                <input type="text" class="form-control" id="jenis_biji" name="jenis_biji">
            </div>
            <div class="mb-3">
                <label for="asal" class="form-label">Asal</label>
                <input type="text" class="form-control" id="asal" name="asal">
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="text" class="form-control" id="stok" name="stok">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop