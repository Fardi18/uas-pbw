@extends('admin.layouts.app')

@section('title', 'Withdrawal Requests')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Withdrawal Requests</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Bengkel</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requests as $request)
                        <tr>
                            <td>{{ $request->pemilikBengkel->nama_bengkel }}</td>
                            <td>{{ number_format($request->amount, 2, ',', '.') }}</td>
                            <td>{{ ucfirst($request->status) }}</td>
                            <td>
                                <form action="{{ route('admin.withdrawal_requests.updateStatus', $request->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" onchange="this.form.submit()">
                                        <option value="approved" {{ $request->status == 'approved' ? 'selected' : '' }}>
                                            Approve</option>
                                        <option value="rejected" {{ $request->status == 'rejected' ? 'selected' : '' }}>
                                            Reject</option>
                                        <option value="transferred"
                                            {{ $request->status == 'transferred' ? 'selected' : '' }}>Transferred</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
