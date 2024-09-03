@extends('layouts.admin')

@section('styles')
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css"> --}}
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.2/css/buttons.dataTables.css">
@endsection

@section('content')
<h4 class="m-5"><span style="color: white">Tables </span> Buku</h4>
<div class="card m-5">
    <div class="card-header">
        <div class="float-start">
            <h5> Buku </h5>
        </div>
        <div class="float-end">
            <a href="{{route('buku.create')}}" class="btn btn-sm btn-primary">
                Add
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table" id="example">
                <thead>
                    <td>No</td>
                    <td>Judul</td>
                    <td>Tahun</td>
                    <td>Jumlah</td>
                    <td>Kategori</td>
                    <td>Penulis</td>
                    <td>Penerbit</td>
                    <td>Image</td>
                    <td>Action</td>
                </thead>
                @php $no = 1; @endphp
                <tbody>
                    @foreach ($buku as $item)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$item->judul}}</td>
                        <td>{{$item->tahun_terbit}}</td>
                        <td>{{$item->jumlah_buku}}</td>
                        <td>{{$item->kategori->nama_kategori}}</td>
                        <td>{{$item->penulis->nama_penulis}}</td>
                        <td>{{$item->penerbit->nama_penerbit}}</td>
                        <td>
                            <img src="{{ asset('images/buku/'.$item->image_buku) }}" alt="Product Image"
                            style="width: 50px; height: 50px;">
                        </td>
                        <td>
                            <form action="{{route('buku.destroy', $item->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <a href="{{route('buku.edit', $item->id)}}" class="btn btn-sm btn-success">Edit
                                </a>
                                {{-- <a href="{{route('buku.show', $item->id)}}" class="btn btn-sm btn-warning">Show
                                </a> --}}
                                <a href="{{ route('buku.destroy', $item->id) }}" class="btn btn-sm btn btn-danger"
                                    data-confirm-delete="true">Delete</a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
{{-- <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.1.5/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.5/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.bootstrap5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.colVis.min.js"></script>
<script>
   new DataTable('#example', {
    layout: {
        topStart: {
            buttons: ['excel', 'pdf', 'colvis']
        }
    }
});
</script>
@endpush