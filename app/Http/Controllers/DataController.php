<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DataRequest;
use App\Models\Makanan;

use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataDummy = Makanan::all();

        return view("crud.index", compact('dataDummy'));
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
    public function store(DataRequest $request)
    {
        DB::transaction(function () use ($request) {
            Makanan::create($request->validated());
        });

        return redirect()->route('data-index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Makanan::where('id', $id)->first();

        return view("crud.update", compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataRequest $request, string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DataRequest $request)
    {
        $id = $request->id;

        DB::transaction(function () use ($request, $id) {
            $data = Makanan::findOrFail($id);

            $data->update($request->validated());
        });

        return redirect()->route('data-index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);

        $id = $request->get('id');

        DB::transaction(function() use ($id) {
            Makanan::where('id', $id)->delete();
        });

        return redirect()->route('data-index');
    }
}
