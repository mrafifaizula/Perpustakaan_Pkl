@extends('layouts.profil')

@section('styles')
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
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table" id="example">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Name</td>
                            <td>Judul</td>
                            <td>Jumlah</td>
                            <td>Tanggal Pinjam</td>
                            <td>Tanggal Kembali</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    @php $no = 1; @endphp
                    <tbody>
                        @foreach ($pinjambuku as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->buku->judul }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->tanggal_pinjambuku }}</td>
                                <td>{{ $item->tanggal_kembali }}</td>
                                <td>
                                    <span class="badge badge-sm 
                                        @if ($item->status == 'menunggu') bg-gradient-info
                                        @elseif($item->status == 'diterima') bg-gradient-success
                                        @elseif($item->status == 'ditolak') bg-gradient-danger
                                        @elseif($item->status == 'dikembalikan') bg-gradient-primary @endif
                                    ">
                                        @if ($item->status == 'menunggu')
                                            Menunggu
                                        @elseif($item->status == 'diterima')
                                            Pinjam
                                        @elseif($item->status == 'ditolak')
                                            Ditolak
                                        @elseif($item->status == 'dikembalikan')
                                            Dikembalikan
                                        @endif
                                    </span>
                                </td>
                                
                                <td>
                                    <!-- Add buttons or links for actions like view, edit, delete if needed -->
                                    <form action="{{ route('pinjambuku.kembalikan', $item->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-warning">Kembalikan</button>
                                    </form>                                    
                                </td>
                            </tr>

                            <!-- start Modal -->
                            <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel{{ $item->id }}">Detail Buku</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6 mb-2">
                                                    <label for="">Name</label>
                                                    <input type="text" class="form-control" value="{{ $item->user->name }}" disabled>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="">Judul</label>
                                                    <input type="text" class="form-control" value="{{ $item->buku->judul }}" disabled>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="">Jumlah Buku</label>
                                                    <input type="text" class="form-control" value="{{ $item->buku->jumlah_buku }}" disabled>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="">Tanggal Pinjam</label>
                                                    <input type="text" class="form-control" value="{{ $item->tanggal_pinjambuku }}" disabled>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="">Tanggal Kembali</label>
                                                    <input type="text" class="form-control" value="{{ $item->tanggal_kembali }}" disabled>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label for="">Status</label>
                                                    <input type="text" class="form-control" value="{{ $item->status }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end modal -->
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.5/js/jquery.dataTables.js"></script>
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
        $(document).ready(function() {
            new DataTable('#example', {
                buttons: ['excel', 'pdf', 'colvis']
            });
        });
    </script>
@endpush
