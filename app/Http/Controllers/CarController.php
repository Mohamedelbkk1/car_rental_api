<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
class CarController extends Controller
{
    public function index(Request $request){
        $query=Car::where('available',true);
        if($request->filled('brand')){
            $query->where('brand','like',"%".$request->brand."%");
        }
        if($request->filled('max_price')){
            $query->where('price_per_day',"<=",$request->max_price);
        }
        return $query->get();
    }

    public function show(Car $car){
        return $car ;
    }

    public function store(Request $request){
        $query=$request->validate([
            'brand'=>'required|string',
            'model'=>'required|string',
            'price_per_day'=>'required|numeric|min:0',
            'image'=>'nullable|string',
        ]);
        return response()->json(Car::create($query),201);
    }

    public function update(Request $request,Car $car){
        $query=$request->validate([
            'brand'=>'sometimes|string',
            'model'=>'sometimes|string',
            'price_per_day'=>'sometimes|numeric|min:0',
            'image'=>"nullable|string",
            'available'=>"sometimes|boolean"
        ]);
        
        $car->update($query);
        return $car;
    }

    public function destroy(Car $car){
        
       $car->delete();

       return response()->json([
        'message'=>'car deleted succesfully'
        ]);
    }
}
