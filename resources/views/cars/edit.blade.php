@extends('layout')
@section('title','Edit Mobil — RentCar Kita')

@section('content')
<div class="card shadow-sm">
  <div class="card-header d-flex justify-content-between align-items-center">
    <div><strong>Edit Mobil</strong></div>
    <div><a href="{{ route('cars.index') }}" class="btn btn-sm btn-outline-secondary">Kembali</a></div>
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach</ul></div>
    @endif

    <form action="{{ route('cars.update', $car->id) }}" method="POST">
      @csrf @method('PUT')

      <div class="row g-3">
        <div class="mb-3">
    <label for="image" class="form-label">Foto Mobil</label>
    <input class="form-control" type="file" id="image" name="image">
</div>

        <div class="col-md-4">
          <label class="form-label">Plat Nomor</label>
          <input type="text" name="number" value="{{ old('number', $car->number) }}" class="form-control" maxlength="50" required>
        </div>

        <div class="col-md-4">
          <label class="form-label">Merek</label>
          <input type="text" name="brand" value="{{ old('brand', $car->brand) }}" class="form-control" required>
        </div>

        <div class="col-md-4">
          <label class="form-label">Jenis</label>
          <input type="text" name="type" value="{{ old('type', $car->type) }}" class="form-control" required>
        </div>

        <div class="col-md-3">
          <label class="form-label">Tahun</label>
          <input type="number" name="year" value="{{ old('year', $car->year) }}" class="form-control" min="1900" max="{{ date('Y') }}" required>
        </div>

        <div class="col-md-3">
          <label class="form-label">Bahan Bakar</label>
          <input type="text" name="gas" value="{{ old('gas', $car->gas) }}" class="form-control" required>
        </div>

        <div class="col-md-3">
          <label class="form-label">Kapasitas (org)</label>
          <input type="number" name="capacity" value="{{ old('capacity', $car->capacity) }}" class="form-control" min="1" max="20" required>
        </div>

        <div class="col-md-3">
          <label class="form-label">Harga / Hari (Rp)</label>
          <input type="number" name="price_per_day" value="{{ old('price_per_day', $car->price_per_day) }}" class="form-control" min="0" required>
        </div>
      </div>

      <div class="mt-4">
        <button class="btn btn-warning text-white">Update</button>
        <a href="{{ route('cars.index') }}" class="btn btn-outline-secondary">Batal</a>
      </div>
    </form>
  </div>
</div>
@endsection
