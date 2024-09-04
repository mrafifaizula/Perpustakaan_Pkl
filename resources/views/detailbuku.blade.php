@extends('layouts.front')

@section('content')
<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
    }

    .product-page {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 20px;
    }

    .product-card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        max-width: 900px;
        width: 100%;
        display: flex;
        flex-direction: row;
        gap: 20px;
    }

    .product-card img {
        width: 50%;
        height: auto;
        max-height: 500px;
        object-fit: cover;
        border-right: 1px solid #ddd;
    }

    .product-details {
        padding: 30px;
        display: flex;
        flex-direction: column;
        gap: 20px;
        width: 50%;
    }

    .breadcrumbs {
        font-size: 0.9em;
        color: #888;
    }

    .breadcrumbs a {
        color: #888;
        text-decoration: none;
    }

    .breadcrumbs a:hover {
        text-decoration: underline;
    }

    .product-details h1 {
        font-size: 1.8em;
        margin: 10px 0;
        color: #333;
    }

    .price {
        font-size: 1.5em;
        color: #d35400;
    }

    .price span {
        font-size: 0.8em;
        color: #888;
    }

    .stock {
        font-size: 1em;
        color: #27ae60;
    }

    .description {
        font-size: 1em;
        color: #555;
    }

    .form-container {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .quantity-container {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .quantity-container button {
        padding: 10px;
        background-color: #ddd;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 1em;
    }

    .quantity-container input {
        width: 50px;
        padding: 10px;
        font-size: 1em;
        text-align: center;
        margin: 0 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .quantity-container button:hover {
        background-color: #ccc;
    }

    .button-container {
        display: flex;
        justify-content: space-between;
        width: 100%;
        gap: 10px;
    }

    .add-to-cart {
        padding: 10px 20px;
        background-color: #000;
        color: #fff;
        border: 1px solid #000;
        border-radius: 4px;
        font-size: 1em;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .add-to-cart:hover {
        background-color: #333;
    }

    .back-button {
        padding: 10px 20px;
        background-color: #ddd;
        color: #000;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 1em;
        font-weight: bold;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .back-button:hover {
        background-color: #ccc;
    }

    .category {
        font-size: 0.9em;
        color: #888;
        margin-top: 20px;
    }

    @media (max-width: 600px) {
        .product-card {
            flex-direction: column;
        }

        .product-details {
            padding: 10px;
            width: 100%;
        }

        .product-details h1 {
            font-size: 1.5em;
        }

        .price,
        .stock,
        .description {
            font-size: 1em;
        }

        .quantity-container input {
            width: 40px;
            padding: 5px;
            font-size: 0.9em;
        }

        .button-container {
            flex-direction: column;
            align-items: flex-start;
        }

        .add-to-cart,
        .back-button {
            width: 100%;
            text-align: center;
            margin-bottom: 10px;
        }
    }
</style>

<div class="product-page">
    <div class="product-card">
        <img src="{{ asset('images/buku/'.$buku->image_buku) }}" alt="{{ $buku->name_buku }}">
        <div class="product-details">
            <h1>{{ $buku->judul }}</h1>
            <div class="stock">Nama Kategori: {{ $buku->kategori->nama_kategori }}</div>
            <p class="description">{{ $buku->desc_buku }}</p>
            <div class="form-container">
            </div>
        </div>
    </div>
</div>

<script>
    function increment() {
        let jumlah = document.getElementById('jumlah');
        let max = jumlah.max;
        if (parseInt(jumlah.value) < max) {
            jumlah.value = parseInt(jumlah.value) + 1;
        }
    }

    function decrement() {
        let jumlah = document.getElementById('jumlah');
        if (parseInt(jumlah.value) > 1) {
            jumlah.value = parseInt(jumlah.value) - 1;
        }
    }
</script>
@endsection