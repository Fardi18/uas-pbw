@extends('mitra.layouts.app')

@section('title', 'Request Penarikan Dana')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Request Penarikan Dana</h3>
        </div>
        <div class="card-body">
            <h3>Total Transaksi: Rp {{ number_format($totalTransaksi, 0, ',', '.') }}</h3>

            <form action="{{ route('pemilik_bengkel.withdrawal_requests.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="amount">Jumlah Penarikan</label>
                    <input type="number" name="amount" id="amount" class="form-control" min="1000"
                        max="{{ $totalTransaksi }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Tarik Dana</button>
            </form>
        </div>
    </div>
@endsection
