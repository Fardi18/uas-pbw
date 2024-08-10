@extends('layouts.app')

@section('title', 'Detail User')

@section('content')
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-12">
                    <div>
                        <h1>Profile <br> {{ $users->name }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="container">
            <div class="row bg-light p-5">
                <div class="col">
                    <form action="#">
                        <div class="row mb-3">
                            <div class="col col-lg-4 col-md-4 col-sm-12">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $users->name }}" disabled>
                            </div>
                            <div class="col col-lg-4 col-md-4 col-sm-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $users->email }}" disabled>
                            </div>
                            <div class="col col-lg-4 col-md-4 col-sm-12">
                                <label for="name" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="name" name="phone_number"
                                    value="{{ $users->phone_number }}" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col col-lg-6 col-md-6 col-sm-12">
                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                <input type="text" class="form-control" id="kecamatan" name="kecamatan"
                                    value="{{ $users->kecamatan->name }}" disabled>
                            </div>
                            <div class="col col-lg-6 col-md-6 col-sm-12">
                                <label for="kelurahan" class="form-label">Kelurahan</label>
                                <input type="text" class="form-control" id="kelurahan" name="kelurahan"
                                    value="{{ $users->kelurahan->name }}" disabled>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col">
                                <div class="">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="alamat"rows="5" disabled>{{ $users->alamat }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end align-items-center">
                            <a href="/profileuser/{{ $users->id }}/edit"
                                class="btn btn-lg btn-warning text-white fw-bold mx-3">Ubah</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
