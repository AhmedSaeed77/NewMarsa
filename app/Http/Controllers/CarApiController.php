<?php

namespace App\Http\Controllers;
use App\Models\Car;
use Illuminate\Http\Request;

class CarApiController extends Controller
{

    public function all()
    {
        try 
        {
            $cars = Car::all();
            foreach($cars as $car)
            {
                $car->images = $car->images()->orderBy('indexx','ASC')->get();
                foreach($car->images as $image)
                {
                    $image->image = url('images/cars/'.$image->image);
                }
            }
            return $cars;
        } 
        catch (\Exception  $e) 
        {
            return response()->json("Car not found", 404);
        }
    }


    public function show($id)
    {
        try
        {
            $car = Car::findOrFail($id);
            $car->images = $car->images()->orderBy('indexx','ASC')->get();
            foreach($car->images as $c)
            {
                $c->image = url('images/cars/'.$c->image);
            }
            return response()->json(["car_details"=>$car], 200);
        }
        catch(\Exception $e)
        {
            return response()->json("Car not found", 404);
        }
    }
}
