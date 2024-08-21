@extends('layout.dashboard.app')
@section('content')
<div class="section-header">
    <h1>Update Produk</h1>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h4>{{ $product->name }}</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('product.update', $product) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $product->name) }}">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Quantity</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="number" name="quantity" class="form-control"
                                    value="{{ old('quantity', $product->quantity) }}" min="1">
                                @error('quantity')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="number" name="price" class="form-control"
                                    value="{{ old('price', $product->price) }}" min="1">
                                @error('price')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea style="width: 100%; height: 200px; min-height: 150px; max-height: 280px;"
                                    name="description"
                                    class="text">{{ old('description', $product->description) }}</textarea>
                                @error('description')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>
</div>
@endsection