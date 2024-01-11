@extends('mitra.layouts.app')

@section('title', 'Jadwal')

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Jadwal</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/owner">Home</a></li>
                        <li class="breadcrumb-item active">Jadwal</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @if ($jadwals->isEmpty())
                        <a href="/owner/jadwal/add" class="btn btn-sm btn-primary">+ Tambah Jadwal</a>
                    @else
                        <a href="/owner/jadwal/add" class="btn btn-sm btn-primary disabled">+ Tambah Jadwal</a>
                    @endif
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Senin</th>
                                <th>Selasa</th>
                                <th>Rabu</th>
                                <th>Kamis</th>
                                <th>Jumat</th>
                                <th>Sabtu</th>
                                <th>Minggu</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwals as $jadwal)
                                <tr>
                                    <td>
                                        {{ $jadwal->senin }}
                                    </td>
                                    <td>
                                        {{ $jadwal->selasa }}
                                    </td>
                                    <td>
                                        {{ $jadwal->rabu }}
                                    </td>
                                    <td>
                                        {{ $jadwal->kamis }}
                                    </td>
                                    <td>
                                        {{ $jadwal->jumat }}
                                    </td>
                                    <td>
                                        {{ $jadwal->sabtu }}
                                    </td>
                                    <td>
                                        {{ $jadwal->minggu }}
                                    </td>
                                    <td>
                                        <a href="/owner/jadwal/{{ $jadwal->id }}/edit" type="button"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <a href="/owner/jadwal/{{ $jadwal->id }}/delete"
                                            class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
