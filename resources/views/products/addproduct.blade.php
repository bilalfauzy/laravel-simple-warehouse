@extends('layout.dashboard.app')
@section('content')
<div class="section-header">
    <h1>Tambah Produk</h1>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h4>Produk Baru</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="POST">
                        @csrf

                        <!-- Input untuk nama produk -->
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Input untuk kuantitas produk -->
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Quantity</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="number" name="quantity"
                                    class="form-control @error('quantity') is-invalid @enderror"
                                    value="{{ old('quantity') }}" min="1">
                                @error('quantity')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Input untuk harga produk -->
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="number" name="price"
                                    class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}"
                                    min="1">
                                @error('price')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Input untuk deskripsi produk -->
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea style="width: 100%; height: 200px; min-height: 150px; max-height: 280px;"
                                    name="description"
                                    class="text @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                @error('description')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection