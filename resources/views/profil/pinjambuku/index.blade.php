@extends('layouts.profil')

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
            {{-- <div class="float-end">
                <a href="{{ route('buku.create') }}" class="btn btn-sm btn-primary">
                    Add
                </a>
            </div> --}}
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table" id="example">
                    <thead>
                        <td>No</td>
                        <td>Name</td>
                        <td>Judul</td>
                        <td>Jumlah</td>
                        <td>Tanggal Pinjam</td>
                        <td>Tanggal Kembali</td>
                        <td>Status</td>
                        <td>Action</td>
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
                                        @if($item->status == 'Kembali')
                                            bg-gradient-success
                                        @elseif($item->status == 'Pinjam')
                                            bg-gradient-danger
                                        @endif
                                    ">
                                        {{ $item->status }}
                                    </span>
                                </td>
                                
                                <td>
                                    <form action="{{ route('buku.destroy', $item->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <a href="{{ route('pinjambuku.edit', $item->id) }}" class="btn btn-sm btn-success">Edit
                                        </a>
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $item->id }}">
                                            Lihat
                                        </button>
                                        <a href="{{ route('buku.destroy', $item->id) }}" class="btn btn-sm btn btn-danger"
                                            data-confirm-delete="true">Delete</a>
                                    </form>
                                </td>
                            </tr>
                            <!-- start Modal show -->
                            <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="row mb-2">
                                                    <div class="col-md-6">
                                                        <label for="">Name</label>
                                                        <input type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            name="name" value="{{ $item->user->name}}" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="">Judul</label>
                                                        <input type="text"
                                                            class="form-control @error('judul') is-invalid @enderror"
                                                            name="judul" value="{{ $item->buku->judul }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-md-6">
                                                        <label for="">Jumlah Buku</label>
                                                        <input type="text"
                                                            class="form-control @error('jumlah_buku') is-invalid @enderror"
                                                            name="jumlah_buku" value="{{ $item->buku->jumlah_buku }}" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="">Tanggal Pinjam</label>
                                                        <input type="text"
                                                            class="form-control @error('tanggal_pinjambuku') is-invalid @enderror"
                                                            name="tanggal_pinjambuku" value="{{ $item->tanggal_pinjambuku }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-md-6">
                                                        <label for="">Tanggal Kembali</label>
                                                        <input type="text"
                                                            class="form-control @error('tanggal_kembali') is-invalid @enderror"
                                                            name="tanggal_kembali" value="{{ $item->tanggal_kembali }}" disabled>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="">Status</label>
                                                        <input type="text"
                                                            class="form-control @error('status') is-invalid @enderror"
                                                            name="status" value="{{ $item->status }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                {{-- end modal --}}
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

    <script>
        const myModal = document.getElementById('myModal')
        const myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
        })
    </script>
@endpush