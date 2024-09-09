@extends('layouts.profil')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Data Buku
                    <a href="{{route('pinjambuku.index')}}" class="btn btn-sm btn-primary"
                        style="float: right">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{route('pinjambuku.update', $pinjambuku->id)}}" method="post"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-2">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ Auth::user()->name }}" readonly>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                name="judul" value="{{$pinjambuku->buku->judul}}" readonly>
                            @error('judul')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control @error('jumlah') is-invalid @enderror"
                                name="jumlah" value="{{$pinjambuku->jumlah}}" readonly>
                            @error('jumlah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="tanggal_pinjambuku">Tanggal Pinjam</label>
                            <input type="date" class="form-control @error('tanggal_pinjambuku') is-invalid @enderror"
                                name="tanggal_pinjambuku" value="{{$pinjambuku->tanggal_pinjambuku}}" readonly>
                            @error('tanggal_pinjambuku')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="tanggal_kembali">Tanggal Kembali</label>
                            <input type="date" class="form-control @error('tanggal_kembali') is-invalid @enderror"
                                name="tanggal_kembali" value="{{$pinjambuku->tanggal_kembali}}" readonly>
                            @error('tanggal_kembali')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="" disabled selected>Status</option>
                                <option value="Pinjam">Pinjam</option>
                                <option value="Kembali">Kembali</option>
                            </select>
                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                       <div class="mb-2">
                            <button class="btn btn-sm btn-success" type="submit">
                                Simpan
                            </button>
                            <button class="btn btn-sm btn-warning" type="reset">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection