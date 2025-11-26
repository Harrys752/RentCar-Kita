<div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <input type="text" class="form-control w-50" placeholder="Cari plat / merek" wire:model.debounce.300ms="search">
        <a href="{{ route('cars.create') }}" class="btn btn-primary btn-sm shadow-sm">
            <i class="bi bi-plus-lg me-1"></i> Tambah Mobil
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Plat</th>
                            <th>Merek</th>
                            <th>Jenis</th>
                            <th>Tahun</th>
                            <th>Bahan Bakar</th>
                            <th>Kapasitas</th>
                            <th class="text-end">Harga / Hari</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cars as $car)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><strong>{{ $car->number }}</strong></td>`
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
                                <td colspan="9" class="text-center py-4 text-muted">Belum ada data mobil.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-3">
        {{ $cars->links() }}
    </div>
</div>
