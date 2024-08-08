@extends('mitra.layouts.app')

@section('title', 'Dashboard')

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/owner">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')

    <div class="row">
        @if (!$bengkel)
            <div class="col-12">
                <div class="alert alert-warning text-center text-white">
                    <h5>Anda belum mendaftarkan bengkel. Silakan daftar bengkel terlebih dahulu.</h5>
                </div>
            </div>
        @else
            <div class="col-12 col-sm-6 col-md-6">
                <a href="owner/layanan">
                    <div class="info-box">
                        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-cog"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Layanan</span>
                            <span class="info-box-number">{{ $layananCount }} Layanan</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </a>
                <!-- /.info-box -->
            </div>
            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-6">
                <a href="owner/product">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-barcode"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Produk</span>
                            <span class="info-box-number">{{ $productCount }} Produk</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </a>
                <!-- /.info-box -->
            </div>
            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>
            <div class="col-12 col-sm-6 col-md-6">
                <a href="owner/booking">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-calendar"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Booking</span>
                            <span class="info-box-number">{{ $bookingCount }} Booking</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </a>
                <!-- /.info-box -->
            </div>
            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-6">
                <a href="owner/transaction">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Transaksi</span>
                            <span class="info-box-number">{{ $transactionCount }} Transaksi</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </a>
                <!-- /.info-box -->
            </div>
        @endif
    </div>
@endsection
