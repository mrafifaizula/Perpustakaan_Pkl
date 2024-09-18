@extends('layouts.backend')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.2/css/buttons.dataTables.css">
@endsection

@section('content')
    <h4 class="m-5"><span style="color: white">Riwayat </span>Peminjaman & Tolak </h4>
    <div class="card m-5">
        <div class="card-header">
            <div class="float-start">
                <h5>Riwayat Peminjam & Tolak</h5>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table" id="example1">
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
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($pinjambuku as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->buku->judul }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->tanggal_pinjambuku }}</td>
                                <td>{{ $item->tanggal_kembali }}</td>
                                <td>
                                    @if ($item->status === 'dikembalikan')
                                        <span class="badge badge-sm bg-gradient-primary">Dikembalikan</span>
                                    @elseif ($item->status === 'ditolak')
                                        <span class="badge badge-sm bg-gradient-danger">Ditolak</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $item->id }}"><i class="bi bi-eye"></i></button>
                                </td>
                            </tr>

                            <!-- start Modal -->
                            <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Riwayat Peminjam & Tolak
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="row mb-2">
                                                    <div class="col-md-6">
                                                        <label for="">Name</label>
                                                        <input type="text" class="form-control" name="name"
                                                            value="{{ $item->user->name }}" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="">Judul</label>
                                                        <input type="text" class="form-control" name="judul"
                                                            value="{{ $item->buku->judul }}" disabled>
                                                    </div>
                                                </div>

                                                <div class="row mb-2">
                                                    <div class="col-md-6">
                                                        <label for="">Jumlah Buku</label>
                                                        <input type="text" class="form-control" name="jumlah_buku"
                                                            value="{{ $item->jumlah }}" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="">Code Buku</label>
                                                        <input type="text" class="form-control" name="code_buku"
                                                            value="{{ $item->buku->code_buku }}" disabled>
                                                    </div>
                                                </div>

                                                <div class="row mb-2">
                                                    <div class="col-md-6">
                                                        <label for="">Tanggal Pinjam</label>
                                                        <input type="text" class="form-control" name="tanggal_pinjambuku"
                                                            value="{{ $item->tanggal_pinjambuku }}" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="">Tanggal Kembali</label>
                                                        <input type="text" class="form-control" name="tanggal_kembali"
                                                            value="{{ $item->tanggal_kembali }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
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
        new DataTable('#example1', {
            layout: {
                topStart: {
                    buttons: ['excel', 'pdf', 'colvis']
                }
            }
        });
    </script>
@endpush
