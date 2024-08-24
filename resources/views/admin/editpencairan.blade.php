@extends('admin.layouts.app')

@section('title', 'Pencairan Edit')

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Pencairan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item active">Edit Pencairan</li>
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
                    <h3 class="card-title">Edit Pencairan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.pencairan.update', $pencairan->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Total Pencairan</label>
                            <input type="number" class="form-control" placeholder="Pendapatan Saat Ini"
                                value="{{ number_format($pencairan->amount, 0, ',', '.') }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Tanggal Pencairan</label>
                            <input type="text" class="form-control" placeholder="Jumlah yang ditarik"
                                value="{{ $pencairan->created_at }}" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Bank Tujuan</label>
                            <input type="text" class="form-control" placeholder="Jumlah yang ditarik"
                                value="{{ $pencairan->bank }}" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Rekening Tujuan</label>
                            <input type="text" class="form-control" placeholder="Jumlah yang ditarik"
                                value="{{ $pencairan->number }}" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Pemilik Rekening Tujuan</label>
                            <input type="text" class="form-control" placeholder="Jumlah yang ditarik"
                                value="{{ $pencairan->name }}" required>
                        </div>
                        <div class="form-group">
                            <label>Status Pencairan</label>
                            <select class="form-control select2" style="width: 100%;" id="status" name="status">
                                <option selected="selected">-- Pilih Status --</option>
                                <option value="pending">Pending</option>
                                <option value="transferred">Transferred</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Bukti Pencairan</label>
                            <img id="image-preview" src="#" alt="Image Preview"
                                style="display: none; margin-top: 10px; max-width: 400px; max-height:700px" class="mb-2">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Cari Foto</label>
                                </div>
                            </div>

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
    @include('sweetalert::alert')
@endsection
@push('javascript')
    <script>
        document.getElementById('image').addEventListener('change', function(event) {
            var file = event.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var preview = document.getElementById('image-preview');
                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            reader.readAsDataURL(file);
        });
    </script>
@endpush
