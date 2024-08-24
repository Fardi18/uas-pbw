@extends('mitra.layouts.app')

@section('title', 'Detail Pencairan')

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Pencairan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/owner">Home</a></li>
                        <li class="breadcrumb-item active">Detail Pencairan</li>
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
                    <h3 class="card-title">Detail Pencairan</h3>
                </div>
                <table id="example2" class="table table-hover">
                    <tbody>
                        <tr>
                            <th>Jumlah yang Dicairkan</th>
                            <td>Rp{{ number_format($pencairan->amount) }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Pencairan</th>
                            <td>{{ $pencairan->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Status Pencairan</th>
                            <td>{{ $pencairan->status }}</td>
                        </tr>
                        <tr>
                            <th>Rekening Pencairan</th>
                            <td>{{ $pencairan->number }}</td>
                        </tr>
                        <tr>
                            <th>Bank Pencairan</th>
                            <td>{{ $pencairan->bank }}</td>
                        </tr>
                        <tr>
                            <th>Pemilik Rekening</th>
                            <td>{{ $pencairan->name }}</td>
                        </tr>
                        <tr>
                            <th>Bukti Pencairan</th>
                            <td>
                                <img src="{{ asset('images/' . $pencairan->image) }}" style="width: 500px; height:auto">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
