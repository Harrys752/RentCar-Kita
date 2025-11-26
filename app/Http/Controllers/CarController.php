<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->q;
        $cars = Car::when($query, function($q) use ($query){
            $q->where('brand', 'like', "%$query%")
              ->orWhere('number', 'like', "%$query%");
        })->get();

        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|max:50',
            'brand' => 'required',
            'type' => 'required',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'gas' => 'required',
            'capacity' => 'required|integer|min:1',
            'price_per_day' => 'required|integer|min:10000',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $car = new Car();

    $car->number = $request->number;
    $car->brand = $request->brand;
    $car->type = $request->type;
    $car->year = $request->year;
    $car->gas = $request->gas;
    $car->capacity = $request->capacity;
    $car->price_per_day = $request->price_per_day;

        if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/cars', $filename);

        $car->foto = $filename;
    }

    // INI DIA YANG LO TANYA
    $car->save();

    return redirect()->route('cars.index')->with('success','Mobil berhasil ditambahkan!');
    }

    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }

    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $request->validate([
            'number' => 'required|max:50',
            'brand' => 'required',
            'type' => 'required',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'gas' => 'required',
            'capacity' => 'required|integer|min:1',
            'price_per_day' => 'required|integer|min:10000',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
    $file = $request->file('foto');
    $filename = time() . '_' . $file->getClientOriginalName();
    $file->storeAs('public/cars', $filename);

    $car->foto = $filename;
}


        $car->update($data);

        return redirect()->route('cars.index')->with('success', 'Data mobil berhasil diupdate!');
    }

    public function destroy(Car $car)
    {
        if ($car->foto && Storage::disk('public')->exists($car->foto)) {
            Storage::disk('public')->delete($car->foto);
        }

        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Mobil dihapus.');
    }
}
