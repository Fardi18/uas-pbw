@extends('layouts.app')

@section('title', 'Daftar Transaksi')

@section('content')
    <section class="service">
        <div class="container" style="margin-bottom: 200px;">
            <div class="row">
                <div class="col">
                    <div class="text-center my-5">
                        <h3 class="title">List Transaksi</h3>
                    </div>
                </div>
            </div>
            <div class="row ">
                @if ($transactions->isEmpty())
                    <p><i class="text-warning">Ups, Kamu belum memiliki transaksi</i></p>
                @else
                    <div class="col">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Kode Transaksi</th>
                                    <th scope="col">Nama Bengkel</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Status Pembayaran</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <th scope="row">{{ $transaction->id }}</th>
                                        <td>{{ $transaction->transaction_code }}</td>
                                        <td>{{ $transaction->bengkel->name }}</td>
                                        <td>Rp{{ number_format($transaction->grand_total) }}</td>
                                        <td>{{ $transaction->payment_status }}</td>
                                        <td>
                                            <a href="{{ route('customer.show.transaction', $transaction) }}">Detail
                                                Transaction</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
