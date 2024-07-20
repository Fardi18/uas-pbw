@extends('mitra.layouts.app')

@section('title', 'Bengkel')

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Bengkel</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/owner">Home</a></li>
                        <li class="breadcrumb-item active">Bengkel</li>
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
                    @if ($bengkels->isEmpty())
                        <a href="/owner/bengkel/add" class="btn btn-sm btn-primary">+ Tambah Bengkel</a>
                    @else
                        <a href="/owner/bengkel/add" class="btn btn-sm btn-primary disabled">+ Tambah Bengkel</a>
                    @endif
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Nama Bengkel</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bengkels as $bengkel)
                                <tr>
                                    <td>
                                        @if ($bengkel->image)
                                            <img src="{{ asset('images/' . $bengkel->image) }}" alt="{{ $bengkel->name }}"
                                                width="100">
                                        @endif
                                    </td>
                                    <td>{{ $bengkel->name }}</td>
                                    <td>{{ $bengkel->alamat }}</td>
                                    <td>
                                        <a href="/owner/bengkel/{{ $bengkel->id }}/edit" type="button"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <a href="/owner/bengkel/{{ $bengkel->id }}/delete"
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
