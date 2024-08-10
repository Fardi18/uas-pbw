@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-12">
                    <div>
                        <h1>Edit Profile <br> {{ $users->name }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="container">
            <div class="row p-5 bg-light">
                <div class="col">
                    <form action="/profileuser/{{ $users->id }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $users->name }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        Nama tidak boleh kosong
                                    </div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $users->email }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        Email tidak boleh kosong
                                    </div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="name" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="name" name="phone_number"
                                    value="{{ $users->phone_number }}">
                                @error('phone_number')
                                    <div class="invalid-feedback">
                                        Phone mumber tidak boleh kosong
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="kecamatan_id" class="form-label">Kecamatan</label>
                                <select class="form-select" aria-label="Default select example" name="kecamatan_id">
                                    <option selected>-- Pilih Kecamatan --</option>
                                    @foreach ($kecamatans as $kecamatan)
                                        <option value="{{ $kecamatan->id }}">{{ $kecamatan->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col">
                                <label for="kelurahan_id" class="form-label">Kelurahan</label>
                                <select class="form-select" aria-label="Default select example" name="kelurahan_id">
                                    <option selected>-- Pilih Kelurahan --</option>
                                    @foreach ($kelurahans as $kelurahan)
                                        <option value="{{ $kelurahan->id }}">{{ $kelurahan->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="5">{{ $users->alamat }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        Alamat tidak boleh kosong
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="action-user d-flex justify-content-end align-items-center">
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
@endsection
