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
                        <div class="form-group">
                            <label for="jadwal_senin">Senin</label>
                            <input type="text" class="form-control" id="jadwal_senin" name="jadwal_senin"
                                placeholder="Jadwal senin" value="{{ $jadwal->senin }}">
                        </div>
                        <div class="form-group">
                            <label for="jadwal_selasa">Selasa</label>
                            <input type="text" class="form-control" id="jadwal_selasa" name="jadwal_selasa"
                                placeholder="Jadwal senin" value="{{ $jadwal->selasa }}">
                        </div>
                        <div class="form-group">
                            <label for="jadwal_rabu">Rabu</label>
                            <input type="text" class="form-control" id="jadwal_rabu" name="jadwal_rabu"
                                placeholder="Jadwal rabu" value="{{ $jadwal->rabu }}">
                        </div>
                        <div class="form-group">
                            <label for="jadwal_kamis">Kamis</label>
                            <input type="text" class="form-control" id="jadwal_kamis" name="jadwal_kamis"
                                placeholder="Jadwal kamis" value="{{ $jadwal->kamis }}">
                        </div>
                        <div class="form-group">
                            <label for="jadwal_jumat">Jumat</label>
                            <input type="text" class="form-control" id="jadwal_jumat" name="jadwal_jumat"
                                placeholder="Jadwal jumat" value="{{ $jadwal->jumat }}">
                        </div>
                        <div class="form-group">
                            <label for="bengkel_name">Sabtu</label>
                            <input type="text" class="form-control" id="jadwal_sabtu" name="jadwal_sabtu"
                                placeholder="Jadwal sabtu" value="{{ $jadwal->sabtu }}">
                        </div>
                        <div class="form-group">
                            <label for="jadwal_minggu">Minggu</label>
                            <input type="text" class="form-control" id="jadwal_minggu" name="jadwal_minggu"
                                placeholder="Jadwal minggu" value="{{ $jadwal->minggu }}">
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
