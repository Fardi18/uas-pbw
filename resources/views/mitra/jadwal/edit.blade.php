@extends('mitra.layouts.app')

@section('title', 'Edit Jadwal')

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Jadwal</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/owner">Home</a></li>
                        <li class="breadcrumb-item active">Edit Jadwal</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Jadwal</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/owner/jadwal/{{ $jadwal->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        {{-- senin --}}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="jadwal_senin">Senin Buka</label>
                                    <input type="time" class="form-control" id="senin_buka" name="senin_buka"
                                        value="{{ $jadwal->senin_buka }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="jadwal_senin">Senin Tutup</label>
                                    <input type="time" class="form-control" id="senin_tutup" name="senin_tutup"
                                        value="{{ $jadwal->senin_tutup }}">
                                </div>
                            </div>
                        </div>
                        {{-- selasa --}}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="jadwal_selasa">Selasa Buka</label>
                                    <input type="time" class="form-control" id="selasa_buka" name="selasa_buka"
                                        value="{{ $jadwal->selasa_buka }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="jadwal_selasa">Selasa Tutup</label>
                                    <input type="time" class="form-control" id="selasa_tutup" name="selasa_tutup"
                                        value="{{ $jadwal->selasa_tutup }}">
                                </div>
                            </div>
                        </div>
                        {{-- rabu --}}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="jadwal_rabu">Rabu Buka</label>
                                    <input type="time" class="form-control" id="rabu_buka" name="rabu_buka"
                                        value="{{ $jadwal->rabu_buka }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="jadwal_rabu">Rabu Tutup</label>
                                    <input type="time" class="form-control" id="rabu_tutup" name="rabu_tutup"
                                        value="{{ $jadwal->rabu_tutup }}">
                                </div>
                            </div>
                        </div>
                        {{-- kamis --}}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="jadwal_kamis">Kamis Buka</label>
                                    <input type="time" class="form-control" id="kamis_buka" name="kamis_buka"
                                        value="{{ $jadwal->kamis_buka }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="jadwal_kamis">Kamis Tutup</label>
                                    <input type="time" class="form-control" id="kamis_tutup" name="kamis_tutup"
                                        value="{{ $jadwal->kamis_tutup }}">
                                </div>
                            </div>
                        </div>
                        {{-- jumat --}}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="jadwal_jumat">Jumat Buka</label>
                                    <input type="time" class="form-control" id="jumat_buka" name="jumat_buka"
                                        value="{{ $jadwal->jumat_buka }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="jadwal_jumat">Jumat Tutup</label>
                                    <input type="time" class="form-control" id="jumat_tutup" name="jumat_tutup"
                                        value="{{ $jadwal->jumat_tutup }}">
                                </div>
                            </div>
                        </div>
                        {{-- sabtu --}}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="jadwal_sabtu">Sabtu Buka</label>
                                    <input type="time" class="form-control" id="sabtu_buka" name="sabtu_buka"
                                        value="{{ $jadwal->sabtu_buka }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="jadwal_sabtu">Sabtu Tutup</label>
                                    <input type="time" class="form-control" id="sabtu_tutup" name="sabtu_tutup"
                                        value="{{ $jadwal->sabtu_tutup }}">
                                </div>
                            </div>
                        </div>
                        {{-- minggu --}}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="jadwal_minggu">Minggu Buka</label>
                                    <input type="time" class="form-control" id="minggu_buka" name="minggu_buka"
                                        value="{{ $jadwal->minggu_buka }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="jadwal_minggu">Minggu Tutup</label>
                                    <input type="time" class="form-control" id="minggu_tutup" name="minggu_tutup"
                                        value="{{ $jadwal->minggu_tutup }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
