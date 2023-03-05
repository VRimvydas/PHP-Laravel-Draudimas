<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Owner;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class CarController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');

//        $this->middleware(function ($request, $next) {
//
//            if ($request->user()!==0){
//                if ($request->user()->type=='admin'){
//                    return $next($request);
//                }else{
//                    return redirect()->back();
//
//                }
//            }
//            else { return redirect()->route('login');
//            }
//
//        });


    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Car $car)
    {

        $reg_number=$request->session()->get('car_reg_number');
        $brand=$request->session()->get('car_brand');
        $model=$request->session()->get('car_model');



        $cars=Car::with('owner');
        if ($reg_number || $brand || $model != null){
            $cars->where('reg_number','like', "%$reg_number%");
            $cars->where('brand','like', "%$brand%");
            $cars->where('model','like', "%$model%");

        }
        $cars=$cars->orderBy('reg_number')->get();

        return view("cars.index", [
            "cars"=>$cars,
            "reg_number"=>$reg_number,
            "brand"=>$brand,
            "model"=>$model,
            'owners'=>Owner::all(),
            "car"=>$car,




        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("cars.create",[
            'owners'=>Owner::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Car::create($request->all());
        return redirect()->route("cars.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view("cars.edit",[
            'car'=>$car,
            'owners'=>Owner::all()
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $car->fill($request->all());
        $car->save();
        return redirect()->route("cars.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route("cars.index");
    }

    public function search(Request $request){
        $request->session()->put('car_reg_number', $request->reg_number);
        $request->session()->put('car_brand', $request->brand);
        $request->session()->put('car_model', $request->model);
        return redirect()->route('cars.index');


    }
}
