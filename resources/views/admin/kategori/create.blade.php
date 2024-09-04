@extends('layouts.admin')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Data Kategori
                    <a href="{{ route('kategori.index') }}" class="btn btn-sm btn-primary"
                        style="float: right">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('kategori.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="nama_kategori">Name Kategori</label>
                            <input type="text" placeholder="Judul kategori"
                                class="form-control @error('nama_kategori') is-invalid @enderror"
                                name="nama_kategori">
                            @error('nama_kategori')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="desc_kategori" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('desc_kategori') is-invalid @enderror"
                                name="desc_kategori"></textarea>
                            @error('desc_kategori')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <button class="btn btn-sm btn-success" type="submit">Simpan</button>
                            <button class="btn btn-sm btn-warning" type="reset">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection