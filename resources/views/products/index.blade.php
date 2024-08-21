@extends('layout.dashboard.app')
@section('content')
<div class="section-header d-flex justify-content-between align-items-center">
  <h1>Daftar Produk</h1>
  <div class="section-header-button">
    <a href="{{ route('product.create')}}" class="btn btn-primary">Tambah Baru</a>
  </div>
</div>

<div class="section-body">
  <div class="row mt-4">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Semua Produk</h4>
        </div>
        @if (session('message'))
      <div class="alert alert-success">
        {{ session('message') }}
      </div>
    @endif
        <div class="card-body">
          <div class="clearfix mb-3"></div>

          <div class="table-responsive">
            <table class="table table-striped">
              <!-- Judul tabel -->
              <tr>
                <th>Nama</th>
                <th>Quantity</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th></th>
              </tr>

              <!-- isi tabel -->
              @forelse ($products as $product)
          <tr>
          <td>{{$product->name}}</td>

          <td>{{$product->quantity}}</td>
          <td>{{ (int) $product->price}}</td>
          <td>{{$product->description}}</td>
          <td>{{$product->created_at->format('d-m-Y')}}</td>
          <td>{{$product->updated_at->format('d-m-Y')}}</td>
          <td>
            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
            action="{{ route('product.destroy', $product->id) }}" method="POST">

            <a href="{{ route('product.edit', $product->id) }}"
              class="btn btn-sm btn-primary mb-1 mt-1 w-100">EDIT</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger mb-1 mt-1 w-100">DELETE</button>
            </form>
          </td>
          </tr>
        @empty
        <tr>
        <td class="text-center text-mute" colspan="4">Data produk tidak tersedia</td>
        </tr>
      @endforelse
            </table>
          </div>

          <!-- pagination -->
          @if ($products->hasPages())
        <div class="float-right">
        {{ $products->links('pagination::bootstrap-4') }}
        </div>
      @endif


        </div>
      </div>
    </div>
  </div>
</div>
@endsection