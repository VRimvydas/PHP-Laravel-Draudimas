<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
    public function index(Request $request)
    {

        $reg_number=$request->session()->get('reg_number');
        $brand=$request->session()->get('brand');
        $model=$request->session()->get('model');
        $ownerFilter = $request->session()->get('ownerFilter');



        $cars=Car::with('owner');
        if ($reg_number != null){
            $cars->where('reg_number','like', "%$reg_number%");
        }
        if ($brand != null){
            $cars->where('brand','like', "%$brand%");
        }
        if ($model != null) {
            $cars->where('model', 'like', "%$model%");
        }
        if ($ownerFilter != null) {
            $cars->where('owner_id', 'like', "$ownerFilter");
        }

        $cars=$cars->orderBy('reg_number')->get();

        return view("cars.index", [
            "cars"=>$cars,
            "reg_number"=>$reg_number,
            "brand"=>$brand,
            "model"=>$model,
            'owners'=>Owner::orderBy('name')->get(),

            'ownerFilter'=>$ownerFilter,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("cars.create",[
            'owners'=>Owner::orderBy('name')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'reg_number'=>'required|unique:cars,reg_number|regex:/^[A-Za-z]{3}[0-9]{3}$/',
//            'reg_number'=>'required|unique:cars,reg_number|alpha_num:ascii|size:6',
            'brand'=>'required',
            'model'=>'required'
        ],[
//            'reg_number.required'=>'Valstybinis numerį įvesti privaloma',
//            'reg_number.unique'=> 'Toks valstybinis numeris jau yra',
//            'reg_number.alpha_num'=> 'Valstybinį numerį turi sudaryti tik raidės ir skaičiai',
            'reg_number.regex'=> 'Valstybinis numeris turi būti sudarytas iš 3 raidžių ir 3 skaičių',
//            'reg_number.size'=> 'Valstybinis numeris turi būti sudarytas iš 6 simbolių',


            'brand.required'=>'Automobilio markę įvesti privaloma',
            'model.required'=>'Automobilio modelį įvesti privaloma'
        ]);
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
        $request->session()->put('reg_number', $request->reg_number);
        $request->session()->put('brand', $request->brand);
        $request->session()->put('model', $request->model);
        $request->session()->put('ownerFilter', $request->ownerFilter);
        return redirect()->route('cars.index');


    }


}
