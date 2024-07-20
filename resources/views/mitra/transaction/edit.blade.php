@extends('mitra.layouts.app')

@section('title', 'Edit Transaksi')

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Transaksi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/owner">Home</a></li>
                        <li class="breadcrumb-item active">Edit Transaksi</li>
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
                    <h5>Edit Transaksi {{ $transaction->transaction_code }}</h5>
                </div>
                <div class="row m-4">
                    <div class="col">
                        <form action="{{ route('updatetransaction', ['id' => $transaction->id]) }}" method="post">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label>Status Pengiriman</label>
                                <select class="form-control select2" style="width: 100%;" id="status"
                                    name="shipping_status">
                                    <option selected="selected">-- Pilih Status Pengiriman --</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Disiapkan">Disiapkan</option>
                                    <option value="Dikirim">Dikirim</option>
                                    <option value="Selesai">Selesai</option>
                                </select>
                            </div>
                            <div class="action-user d-flex justify-content-end align-items-center">
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
