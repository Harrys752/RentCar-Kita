@extends('layout')
@section('title','Daftar Mobil — RentCar Kita')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h3 class="mb-0">Daftar Mobil</h3>

  <div class="d-flex gap-2">
    <form class="d-flex" method="GET" action="{{ route('cars.index') }}">
      <input name="q" class="form-control form-control-sm" type="search" placeholder="Cari plat / merek" value="{{ request('q') }}">
      <button class="btn btn-sm btn-outline-secondary ms-2" type="submit"><i class="bi bi-search"></i></button>
    </form>

    <a href="{{ route('cars.create') }}" class="btn btn-primary btn-sm shadow-sm">
      <i class="bi bi-plus-lg me-1"></i> Tambah Mobil
    </a>
  </div>
</div>

<div class="card shadow-sm">
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover mb-0 align-middle text-nowrap">
        <thead class="table-dark">
          <tr>
            <th style="width:40px">#</th>
            <th>Gambar</th>
            <th>Plat</th>
            <th>Merek</th>
            <th>Jenis</th>
            <th>Tahun</th>
            <th>Bahan Bakar</th>
            <th>Kapasitas</th>
            <th class="text-end">Harga / Hari</th>
            <th style="width:150px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($cars as $car)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
  @if($car->image)
    <img src="{{ asset('storage/'.$car->image) }}" alt="{{ $car->brand }}" class="img-thumbnail" style="width:120px;">

    <span class="text-muted">Tidak ada</span>
  @endif
</td>

            <td><strong>{{ $car->number }}</strong></td>
            <td>{{ $car->brand }}</td>
            <td>{{ $car->type }}</td>
            <td>{{ $car->year }}</td>
            <td>{{ $car->gas }}</td>
            <td>{{ $car->capacity }} org</td>
            <td class="text-end">Rp {{ number_format($car->price_per_day,0,',','.') }}</td>
            <td class="text-end">
              <a href="{{ route('cars.show',$car->id) }}" class="btn btn-sm btn-outline-success me-1" title="Detail"><i class="bi bi-eye"></i></a>
              <a href="{{ route('cars.edit',$car->id) }}" class="btn btn-sm btn-warning text-white me-1" title="Edit"><i class="bi bi-pencil"></i></a>
              <form action="{{ route('cars.destroy',$car->id) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger btn-delete" data-name="{{ $car->number }}" title="Hapus"><i class="bi bi-trash"></i></button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="10" class="text-center py-4 text-muted">Belum ada data mobil.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- optional: if using pagination -->
<div class="mt-3">
  {{-- {{ $cars->links() }} --}}
</div>
@endsection

@push('scripts')
<script>
  // show toast saat ada session success
  @if(session('success'))
    window.addEventListener('DOMContentLoaded', function() {
      showToast("{{ session('success') }}");
    });
  @endif
</script>
@endpush
