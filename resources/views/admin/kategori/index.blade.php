@extends('layouts.backend')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.2/css/buttons.dataTables.css">
@endsection

@section('content')
    <h4 class="m-5"><span style="color: white">Tables </span> kategori</h4>
    <div class="card m-5">
        <div class="card-header">
            <div class="float-start">
                <h5> kategori </h5>
            </div>
            <div class="float-end">
                <a href="{{ route('kategori.create') }}" class="btn btn-sm btn-primary" title="Add">
                    <i class="bi bi-plus-lg"></i>
                </a>
            </div>                     
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table" id="example">
                    <thead>
                        <td>No</td>
                        <td>kategori</td>
                        <td>Action</td>
                    </thead>
                    @php $no = 1; @endphp
                    <tbody>
                        @foreach ($kategori as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->nama_kategori }}</td>
                                <td>
                                    <form action="{{ route('kategori.destroy', $item->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-sm btn-success" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}" title="Lihat">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <a href="{{ route('kategori.destroy', $item->id) }}" class="btn btn-sm btn-danger" data-confirm-delete="true" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </form>
                                </td>                                
                            </tr>
                            <!-- start Modal -->
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
                                            <div class="mb-2">
                                                <label for="">Nama buku</label>
                                                <input type="text"
                                                    class="form-control @error('nama_kategori') is-invalid @enderror"
                                                    name="nama_kategori" value="{{ $item->nama_kategori }}" disabled>
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
