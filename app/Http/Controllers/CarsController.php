<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Redirect;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::latest()->paginate(5);

        return view('cars.index', compact('cars'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'make' => 'required',
            'model' => 'required',
            'colour' => 'required',
            'top_speed' => 'required'
        ]);
       
        Car::create($request->all());
        return redirect()->route('cars.index')
            ->with('success', 'Greate! Car created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'make' => 'required',
            'model' => 'required',
            'colour' => 'required',
            'top_speed' => 'required'
        ]);

        $car->update($request->all());

        return redirect()->route('cars.index')
            ->with('success', 'Car updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return redirect()->route('cars.index')
            ->with('success', 'Car deleted successfully');

    }
}
