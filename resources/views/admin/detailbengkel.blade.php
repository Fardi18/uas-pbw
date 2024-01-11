@extends('admin.layouts.app')

@section('title', 'Detail Bengkel')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Bengkel {{ $bengkels->name }}</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div>
                <h5 class="fw-bold">Data Bengkel</h5>
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>Nama Bengkel</th>
                            <td>{{ $bengkels->name }}</td>
                        </tr>
                        <tr>
                            <th>Gambar Bengkel</th>
                            <td>
                                <img src="{{ asset('images/' . $bengkels->image) }}"
                                    style="width: 250px; border-radius: 12px">
                            </td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>{{ $bengkels->description }}</td>
                        </tr>
                        <tr>
                            <th>Alamat Bengkel</th>
                            <td>{{ $bengkels->alamat }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
