@extends('layouts.frontend')

@section('content')
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        .product-page {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .product-card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
            display: flex;
            flex-direction: row;
            padding: 0;
            overflow: hidden;
        }

        .product-image {
            width: 40%;
            /* Reduced width */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-details {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .product-details h1 {
            font-size: 1.8em;
            margin: 0;
            color: #333;
            font-weight: bold;
        }

        .product-details p {
            font-size: 1em;
            color: #555;
            margin: 5px 0;
        }

        .button-container {
            display: flex;
            flex-direction: row;
            gap: 15px;
            margin-top: 20px;
        }

        .add-to-cart,
        .back-button,
        .kembali-button {
            padding: 12px 20px;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s ease;
            text-decoration: none;
            color: #fff;
            flex: 1;
        }

        .add-to-cart {
            background-color: #ff5733;
            border: none;
        }

        .add-to-cart:hover {
            background-color: #e04d2e;
        }

        .back-button {
            background-color: #888;
            border: none;
        }

        .back-button:hover {
            background-color: #777;
        }

        .kembali-button {
            background-color: #333;
            border: none;
            margin-top: 15px;
        }

        .kembali-button:hover {
            background-color: #555;
        }

        @media (max-width: 600px) {
            .product-card {
                flex-direction: column;
            }

            .product-image {
                width: 100%;
                height: auto;
                border-bottom: 1px solid #ddd;
            }

            .button-container {
                flex-direction: column;
            }

            .add-to-cart,
            .back-button,
            .kembali-button {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>

    <div class="product-page">
        <div class="product-card">
            <div class="product-image">
                <img src="{{ asset('images/buku/' . $buku->image_buku) }}" alt="{{ $buku->judul }}">
            </div>
            <div class="product-details">
                <h1>{{ $buku->judul }}</h1>
                <p>Kategori: {{ $buku->kategori->nama_kategori }}</p>
                <p>Tahun Terbit: {{ $buku->tahun_terbit }}</p>
                <p>Jumlah: {{ $buku->jumlah_buku }}</p>
                <p>Nama Penulis: {{ $buku->Penulis->nama_penulis }}</p>
                <p>Nama Penerbit: {{ $buku->Penerbit->nama_penerbit }}</p>
                <p>Deskripsi: {{ $buku->desc_buku }}</p>
                <div class="button-container">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Pinjma
                    </button>
                    <a href="{{ url('/') }}" class="back-button">Kembali</a>
                </div>
            </div>
        </div>
    </div>

    {{-- start modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pinjaman.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="nama">Nama</label>
                            <input type="text" placeholder="Nama"
                                class="form-control @error('nama') is-invalid @enderror"
                                name="nama">
                            @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" placeholder="Jumlah"
                                class="form-control @error('jumlah') is-invalid @enderror"
                                name="jumlah">
                            @error('jumlah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="tanggal_minjem">Pinjam Tanggal</label>
                            <input type="date" placeholder="Pinjam Tanggal"
                                class="form-control @error('tanggal_minjem') is-invalid @enderror"
                                name="tanggal_minjem">
                            @error('tanggal_minjem')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="status">Dikembalikan Tanggal</label>
                            <input type="date" placeholder="Dikembalikan Tanggal"
                                class="form-control @error('status') is-invalid @enderror"
                                name="status">
                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="tanggal_kemabli">Status</label>
                            <input type="text" placeholder="Status"
                                class="form-control @error('tanggal_kemabli') is-invalid @enderror"
                                name="tanggal_kemabli">
                            @error('tanggal_kemabli')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-success" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    {{-- end modal --}}
@endsection

<script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function() {
        myInput.focus()
    })
</script>
