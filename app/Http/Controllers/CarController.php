<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\CarCategory;
use App\Http\Requests\CarRequest;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $cars = Car::all();

        $category = CarCategory::all();

        return view("pages.car.index", compact("cars", "category"));
    }

    public function getOneData(Request $request){
        $request->validate([
            'query' => 'required|integer', 
        ]);
    
        $query = $request->get('query');
        
        $car = Car::where('id', $query)->first();
        return response()->json($car);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    {
        DB::transaction(function () use ($request) {
            Car::create($request->validated());
        });

        return redirect()->route('car-index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest $request, string $id)
    {
        DB::transaction(function () use ($request, $id) {
            $car = Car::findOrFail($id);

            $car->update($request->validated());
        });

        return redirect()->route('car-index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::transaction(function () use ($id) {
           Car::findOrFail($id)->delete();
        });

        return redirect()->route('car-index');
    }
}
