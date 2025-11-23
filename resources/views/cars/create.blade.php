@extends('layout')
@section('title','Tambah Mobil — RentCar Kita')

@section('content')
<div class="card shadow-sm">
  <div class="card-body">
    <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="mb-3">
        <label class="form-label">Plat Nomor</label>
        <input type="text" name="number" class="form-control @error('number') is-invalid @enderror" value="{{ old('number') }}">
        @error('number')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Merek</label>
        <input type="text" name="brand" class="form-control @error('brand') is-invalid @enderror" value="{{ old('brand') }}">
        @error('brand')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Jenis</label>
        <input type="text" name="type" class="form-control @error('type') is-invalid @enderror" value="{{ old('type') }}">
        @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Tahun</label>
        <input type="number" name="year" class="form-control @error('year') is-invalid @enderror" value="{{ old('year') }}">
        @error('year')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Bahan Bakar</label>
        <input type="text" name="gas" class="form-control @error('gas') is-invalid @enderror" value="{{ old('gas') }}">
        @error('gas')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Kapasitas</label>
        <input type="number" name="capacity" class="form-control @error('capacity') is-invalid @enderror" value="{{ old('capacity') }}">
        @error('capacity')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Harga / Hari</label>
        <input type="number" name="price_per_day" class="form-control @error('price_per_day') is-invalid @enderror" value="{{ old('price_per_day') }}">
        @error('price_per_day')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Gambar Mobil</label>
        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>

      <button class="btn btn-primary">Simpan</button>
      <a href="{{ route('cars.index') }}" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</div>
@endsection
