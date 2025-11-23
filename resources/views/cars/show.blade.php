@extends('layout')
@section('title','Detail Mobil — RentCar Kita')

@section('content')
<div class="card shadow-sm">
  <div class="card-header d-flex justify-content-between">
    <div><strong>Detail Mobil</strong></div>
    <div><a href="{{ route('cars.edit', $car->id) }}" class="btn btn-sm btn-warning text-white">Edit</a></div>
  </div>

  <div class="card-body">
    <dl class="row">
      <dt class="col-sm-3">Plat Nomor</dt><dd class="col-sm-9">{{ $car->number }}</dd>
      <dt class="col-sm-3">Merek</dt><dd class="col-sm-9">{{ $car->brand }}</dd>
      <dt class="col-sm-3">Jenis</dt><dd class="col-sm-9">{{ $car->type }}</dd>
      <dt class="col-sm-3">Tahun</dt><dd class="col-sm-9">{{ $car->year }}</dd>
      <dt class="col-sm-3">Bahan Bakar</dt><dd class="col-sm-9">{{ $car->gas }}</dd>
      <dt class="col-sm-3">Kapasitas</dt><dd class="col-sm-9">{{ $car->capacity }} orang</dd>
      <dt class="col-sm-3">Harga / Hari</dt><dd class="col-sm-9">Rp {{ number_format($car->price_per_day,0,',','.') }}</dd>
    </dl>
    <a href="{{ route('cars.index') }}" class="btn btn-outline-secondary">Kembali</a>
  </div>
</div>
@endsection
