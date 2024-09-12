@extends('layouts.profil')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Edit Profile</p>
                            <button class="btn btn-primary btn-sm ms-auto">Settings</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="row g-3" method="POST" action="{{ route('user.update', $user->id) }}"
                            enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="col-md-6">
                                <label for="input13" class="form-label">Nama</label>
                                <div class="position-relative">
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" id="input13"
                                        value="{{ $user->name }}" placeholder="Full Name" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="input13" class="form-label">Nomer telepon</label>
                                <div class="position-relative">
                                    <input class="form-control mb-3" type="number" name="tlp"
                                        placeholder="Nama Penulis" value="{{ $user->tlp }}" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="input13" class="form-label">Alamat</label>
                                <div class="position-relative">
                                    {{-- <textarea class="form-control mb-3" name="deskripsi" required> {{$buku->deskripsi}}</textarea> --}}
                                    <textarea class="form-control mb-3" type="text" name="alamat" placeholder="Alamat" required>{{ $user->alamat }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="input13" class="form-label">Foto Profile</label>
                                <div class="position-relative">
                                    {{-- <img src="{{ asset('images/user/' . $user->fotoprofile) }}" class="rounded-circle p-1 border mb-4" width="80" height="80" alt=""> --}}
                                    <input class="form-control mb-3" type="file" name="image_user">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <label for="input16" class="form-label">Email</label>
                                <div class="position-relative">
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ $user->email }}" id="input16" placeholder="Email" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{--             
                            <div class="col-md-12">
                                <label for="input19" class="form-label">level</label>
                                <select id="input19" name="isAdmin" class="form-select">
                                    <option selected="">Pilih...</option>
                                    <option value="0" selected>Peminjam</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                             --}}
                            <div class="col-md-12">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                    {{-- <a href="{{route('user.index')}}" class="btn btn-danger px-4">Cancel</a> --}}
                                    <button type="submit" class="btn btn-primary px-4">update profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <img src="{{ asset('assets/img/bg-profile.jpg') }}" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div class="col-4 col-lg-4 order-lg-2">
                            <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                <a href="javascript:;">
                                    <img src="{{ asset('images/user/' . $user->image_user) }}"
                                        class="rounded-circle img-fluid border border-2 border-white "  width="80" height="80">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                        <div class="d-flex justify-content-between">
                            <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-none d-lg-block">Connect</a>
                            <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-block d-lg-none"><i
                                    class="ni ni-collection"></i></a>
                            <a href="javascript:;"
                                class="btn btn-sm btn-dark float-right mb-0 d-none d-lg-block">Message</a>
                            <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-block d-lg-none"><i
                                    class="ni ni-email-83"></i></a>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="d-flex justify-content-center">
                                    <div class="d-grid text-center mx-4">
                                        <span class="text-lg font-weight-bolder">0</span>
                                        <span class="text-sm opacity-8">Pinjam Buku</span>
                                    </div>
                                    <div class="d-grid text-center">
                                        <span
                                            class="text-lg font-weight-bolder">{{ \App\Models\PinjamBuku::where('id_user', Auth::user()->id)->count() }}</span>
                                        <span class="text-sm opacity-8">Judul Pinjam</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <h5 style="font-size: 15px">
                                Name: {{ Auth::user()->name }}
                            </h5>
                            <div>
                                <i class="ni education_hat mr-2"></i>Smk Assalaam Bandung
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
