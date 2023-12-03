<?php

namespace App\Http\Controllers;

use App\Car;
use App\CarMark;
use App\CarModel;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function getMarks()
    {
        return CarMark::all()->toJson();
    }

    public function getModels()
    {
        return CarModel::with('marks')->get()->toJson();
    }

    public function getCars()
    {
        return CarModel::with('marks', 'models')->get()->toJson();
    }

    public function createCar(Request $request)
    {
        $car = new Car();
        $car->mark_id = $request->get('mark_id');
        $car->model_id = $request->get('model_id');
        $car->year = $request->get('year');
        $car->mileage = $request->get('mileage');
        $car->color = $request->get('color');
        $car->save();

        return json_encode('200' ,'saved successfully');
    }

    public function updateCar(Request $request)
    {
        $car = Car::findOrFail($request->get('id'));;
        $car->mark_id = $request->get('mark_id');
        $car->model_id = $request->get('model_id');
        $car->year = $request->get('year');
        $car->mileage = $request->get('mileage');
        $car->color = $request->get('color');
        $car->save();

        return json_encode('200' ,'updated successfully');
    }

    public function showCar(Request $request)
    {
        return Car::find($request->get('id'))->toJson();

    }


    public function deleteCar(Request $request)
    {
        $car = Car::findOrFail($request->get('id'));
        $car->delete();
    }
}
