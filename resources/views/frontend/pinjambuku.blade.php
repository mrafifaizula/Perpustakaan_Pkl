@extends('layouts.frontend')

<style>
    .card-text {
        font-size: 0.9rem;
    }

    .card-title {
        font-size: 1.5rem;
    }

    .card {
        border-radius: 0.5rem;
        overflow: hidden;
    }

    .img-container {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f8f9fa;
    }

    .img-container img {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }

    .card-body {
        padding: 2rem;
    }

    .btn {
        padding: 0.75rem 1.5rem;
        font-size: 1.125rem;
        border-radius: 0.375rem;
        flex: 1;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 120px;
        white-space: nowrap;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: #ffffff;
        /* Ensure text is readable */
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        color: #ffffff;
        /* Ensure text is readable */
    }

    .button-container {
        display: flex;
        gap: 1rem;
        /* Space between buttons */
    }
</style>

@section('content')
    <div class="main-banner" id="top">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <div class="img-container">
                                    <img src="{{ asset('images/buku/' . $buku->image_buku) }}" class="img-fluid"
                                        alt="...">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <form action="{{ route('pinjambuku.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">

                                        <div class="mb-2">
                                            <label for="name">Name</label>
                                            <input type="text" placeholder="Name Pinjam Buku"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ Auth::user()->name }}" readonly>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <!-- Menyertakan ID Buku -->
                                        <input type="hidden" name="id_buku" value="{{ $buku->id }}">

                                        <div class="mb-2">
                                            <label for="judul">Judul</label>
                                            <input type="text" placeholder="Judul Pinjam Buku"
                                                class="form-control @error('judul') is-invalid @enderror" name="judul"
                                                value="{{ $buku->judul }}" readonly>
                                            @error('judul')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <!-- Input Jumlah Buku -->
                                        <div class="mb-2">
                                            <label for="jumlah">Jumlah</label>
                                            <select name="jumlah"
                                                class="form-control select @error('jumlah') is-invalid @enderror" required>
                                                <option value="">Pilih</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                            @error('jumlah')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <!-- Tanggal Pinjam Otomatis diisi Hari Ini -->
                                        <div class="mb-2">
                                            <label for="tanggal_pinjambuku">Tanggal Pinjam</label>
                                            <input type="date" placeholder="Tanggal Pinjam"
                                                class="form-control @error('tanggal_pinjambuku') is-invalid @enderror"
                                                name="tanggal_pinjambuku" value="{{ date('Y-m-d') }}" readonly>
                                            @error('tanggal_pinjambuku')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <!-- Tanggal Kembali Otomatis Diisi Seminggu Ke Depan -->
                                        <div class="mb-2">
                                            <label for="tanggal_kembali">Tanggal Kembali</label>
                                            <input type="date" placeholder="Tanggal Kembali"
                                                class="form-control @error('tanggal_kembali') is-invalid @enderror"
                                                name="tanggal_kembali" value="{{ date('Y-m-d', strtotime('+1 week')) }}"
                                                readonly>
                                            @error('tanggal_kembali')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <!-- Status -->
                                        <div class="mb-2">
                                            <label for="status">Status</label>
                                            <select name="status"
                                                class="form-control select @error('status') is-invalid @enderror" required>
                                                <option value="">Pilih</option>
                                                <option value="Pinjam">Pinjam</option>
                                                <option value="Kembali">Kembali</option>
                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <!-- Tombol Simpan -->
                                        <div class="mb-2">
                                            <button class="btn btn-sm btn-success" type="submit">Simpan</button>
                                            <button class="btn btn-sm btn-warning" type="reset">Reset</button>
                                            <a href="{{ url('buku', $buku->id) }}" class="btn btn-sm btn-primary"
                                                style="float: right">Kembali</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
