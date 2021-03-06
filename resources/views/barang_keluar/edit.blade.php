@extends('base.main')
@section('content')

<div class="page-title">
  <div class="row m-3">
      <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Edit Data Barang Keluar</h3>
      </div>
  </div>
</div>
@if (session()->has('error'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>  
@endif  
<div class="card">
  <div class="card-body">
    <form action="/barang_keluar/update/{{ $product->id }}" method="POST">
      @csrf
      <div class="form-group col-8">
        <label>Nama Barang</label>
        <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="{{ $product->nama_barang }}" readonly>
      </div>
      <div class="form-group col-8">
        <label>Jumlah Barang</label>
        <input type="text" name="jumlah_barang" class="form-control @error('jumlah_barang') is-invalid @enderror" id="jumlah_barang" placeholder="Jumlah Barang" value="{{ $product->jumlah_barang }}">
        @error('jumlah_barang')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group col-8">
        <label>Harga Satuan</label>
        <input type="text" name="harga_satuan" class="form-control @error('harga_satuan') is-invalid @enderror" id="harga_satuan" placeholder="Harga Satuan" value="{{ $product->harga_satuan }}">
        @error('harga_satuan')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group col-8">
        <label>Tanggal Keluar</label>
        <input type="date" name="tanggal_keluar" class="form-control @error('tanggal_keluar') is-invalid @enderror" id="tanggal_keluar" value="{{ $product->tanggal_keluar }}">
        @error('tanggal_keluar')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <button type="submit" class="btn btn-success mt-3">Submit</button>
      </form>
  </div>
</div>
    
@endsection