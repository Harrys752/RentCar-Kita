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
            $q->where('brand','like',"%$query%")
              ->orWhere('number','like',"%$query%");
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
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // max 2MB
    ]);

    $data = $request->all();

    if($request->hasFile('image')){
        $data['image'] = $request->file('image')->store('cars', 'public'); // simpan path ke DB
    }

    Car::create($data);

    return redirect()->route('cars.index')->with('success', 'Mobil berhasil ditambah!');
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
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    $data = $request->all();

    if($request->hasFile('image')){
        // hapus gambar lama kalau ada
        if($car->image && file_exists(storage_path('app/public/'.$car->image))){
            unlink(storage_path('app/public/'.$car->image));
        }
        $data['image'] = $request->file('image')->store('cars', 'public');
    }

    $car->update($data);

    return redirect()->route('cars.index')->with('success', 'Data mobil berhasil diupdate!');
}


    public function destroy(Car $car)
    {
        if($car->image && Storage::disk('public')->exists($car->image)){
            Storage::disk('public')->delete($car->image);
        }
        $car->delete();
        return redirect()->route('cars.index')->with('success','Mobil dihapus.');
    }
}
