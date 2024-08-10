@extends('mitra.layouts.app')

@section('title', 'Tambah Jadwal')

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Jadwal</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/owner">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Jadwal</li>
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
                    <h3 class="card-title">Tambah Jadwal</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/owner/jadwal" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        {{-- senin --}}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="jadwal_senin">Senin Buka</label>
                                    <input type="time" class="form-control" id="senin_buka" name="senin_buka"
                                        placeholder="Jadwal senin">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="jadwal_senin">Senin Tutup</label>
                                    <input type="time" class="form-control" id="senin_tutup" name="senin_tutup"
                                        placeholder="Jadwal senin">
                                </div>
                            </div>
                        </div>
                        {{-- selasa --}}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="jadwal_selasa">Selasa Buka</label>
                                    <input type="time" class="form-control" id="selasa_buka" name="selasa_buka"
                                        placeholder="Jadwal selasa">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="jadwal_selasa">Selasa Tutup</label>
                                    <input type="time" class="form-control" id="selasa_tutup" name="selasa_tutup"
                                        placeholder="Jadwal selasa">
                                </div>
                            </div>
                        </div>
                        {{-- rabu --}}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="jadwal_rabu">Rabu Buka</label>
                                    <input type="time" class="form-control" id="rabu_buka" name="rabu_buka"
                                        placeholder="Jadwal rabu">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="jadwal_rabu">Rabu Tutup</label>
                                    <input type="time" class="form-control" id="rabu_tutup" name="rabu_tutup"
                                        placeholder="Jadwal rabu">
                                </div>
                            </div>
                        </div>
                        {{-- kamis --}}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="jadwal_kamis">Kamis Buka</label>
                                    <input type="time" class="form-control" id="kamis_buka" name="kamis_buka"
                                        placeholder="Jadwal kamis">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="jadwal_kamis">Kamis Tutup</label>
                                    <input type="time" class="form-control" id="kamis_tutup" name="kamis_tutup"
                                        placeholder="Jadwal kamis">
                                </div>
                            </div>
                        </div>
                        {{-- jumat --}}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="jadwal_jumat">Jumat Buka</label>
                                    <input type="time" class="form-control" id="jumat_buka" name="jumat_buka"
                                        placeholder="Jadwal jumat">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="jadwal_jumat">Jumat Tutup</label>
                                    <input type="time" class="form-control" id="jumat_tutup" name="jumat_tutup"
                                        placeholder="Jadwal jumat">
                                </div>
                            </div>
                        </div>
                        {{-- sabtu --}}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="jadwal_sabtu">Sabtu Buka</label>
                                    <input type="time" class="form-control" id="sabtu_buka" name="sabtu_buka"
                                        placeholder="Jadwal sabtu">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="jadwal_sabtu">Sabtu Tutup</label>
                                    <input type="time" class="form-control" id="sabtu_tutup" name="sabtu_tutup"
                                        placeholder="Jadwal sabtu">
                                </div>
                            </div>
                        </div>
                        {{-- minggu --}}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="jadwal_minggu">Minggu Buka</label>
                                    <input type="time" class="form-control" id="minggu_buka" name="minggu_buka"
                                        placeholder="Jadwal minggu">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="jadwal_minggu">Minggu Tutup</label>
                                    <input type="time" class="form-control" id="minggu_tutup" name="minggu_tutup"
                                        placeholder="Jadwal minggu">
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
