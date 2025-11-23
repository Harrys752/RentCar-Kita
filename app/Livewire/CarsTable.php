<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Car;

class CarsTable extends Component
{
    use WithPagination;

    public $search = '';

    // biar pagination reset tiap search berubah
    protected $updatesQueryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $cars = Car::query()
            ->where('number', 'like', "%{$this->search}%")
            ->orWhere('brand', 'like', "%{$this->search}%")
            ->orderBy('id','desc')
            ->paginate(10); // ganti sesuai kebutuhan

        return view('livewire.cars-table', [
            'cars' => $cars
        ]);
    }
}
