@extends('layouts.profil')

<style>
    body {
        font-family: Arial, sans-serif;
    }

    .container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
        padding: 20px;
    }

    .category-filters {
        width: 100%;
        text-align: center;
        margin-bottom: 20px;
    }

    .category-filters li {
        display: inline-block;
        background-color: #f3f3f3;
        border: none;
        border-radius: 20px;
        padding: 10px 20px;
        margin: 6px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s;
    }

    .category-filters li:hover {
        background-color: #e0e0e0;
    }

    .category-filters li a {
        text-decoration: none;
        color: #000;
        font-size: 14px;
    }

    .category-filters li a.is_active {
        font-weight: bold;
    }

    .card {
        position: relative;
        width: 260px;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        text-align: center;
        background-color: #f9f9f9;
        transition: transform 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card img {
        width: 100%;
        height: auto;
        border-bottom: 2px solid #e0e0e0;
    }

    .badge {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: #e0e0e0;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: bold;
    }

    .badge::before {
        content: ' ';
        position: absolute;
        top: 0;
        right: 0;
        width: 5px;
        height: 5px;
        background-color: #fff;
        border-radius: 50%;
    }

    .card p {
        padding: 15px 10px;
        font-size: 18px;
        font-weight: bold;
        margin: 0;
        color: #333;
    }
</style>


@section('content')
    <div class="container">
        <ul class="category-filters">
            <li>
                <a class="is_active" data-filter="*">Show All</a>
            </li>
            @foreach ($kategori as $item)
                <li>
                    <a data-filter=".{{ $item->nama_kategori }}">{{ $item->nama_kategori }}</a>
                </li>
            @endforeach
        </ul>

        @foreach ($buku as $item)
            <div class="card {{ $item->nama_kategori }}">
                <img src="{{ asset('images/buku/' . $item->image_buku) }}" alt="{{ $item->judul }}">
                <span class="badge">{{ $item->kategori->nama_kategori }}</span>
                <p>{{ $item->judul }}</p>
            </div>
        @endforeach
    </div>
@endsection

<script>
    $(document).ready(function() {
        // Initialize Isotope on the container with the card items
        var $grid = $('.container').isotope({
            itemSelector: '.card',
            layoutMode: 'fitRows'
        });

        // Filter items on click
        $('.category-filters li a').click(function(e) {
            e.preventDefault(); // Prevent default action for anchor links

            // Remove active class from all filter links and add to the clicked one
            $('.category-filters li a').removeClass('is_active');
            $(this).addClass('is_active');

            // Get the filter value from data-filter attribute
            var filterValue = $(this).attr('data-filter');

            // Apply the filter to Isotope
            $grid.isotope({
                filter: filterValue === '*' ? '*' : '.' + filterValue.substring(1)
            });

            return false; // Prevent page from reloading
        });
    });
</script>
