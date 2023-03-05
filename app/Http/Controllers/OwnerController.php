<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function owners(Request $request){
        $name=$request->session()->get('owner_name');
        $surname=$request->session()->get('owner_surname');

        $owners=Owner::with('cars');
        if ($name || $surname != null){
            $owners->where('name','like', "%$name%");
            $owners->where('surname','like', "%$surname%");
        }
            $owners=$owners->orderBy('name')->get();
        return view("owners.list", [
            "owners"=>$owners,
            "name"=>$name,
            "surname"=>$surname
            ]);
    }

    public function create(){
        return view("owners.create");
    }

    public function store(Request $request){
        $owner = new Owner();
        $owner->name=$request->name;
        $owner->surname=$request->surname;
        $owner->save();
        return redirect()->route("owners.list");
    }

    public function update($id){
        $owner=Owner::find($id);
        return view("owners.update",[
            "owner"=>$owner
        ]);
    }

    public function save(Request $request, $id){
        $owner=Owner::find($id);
        $owner->name=$request->name;
        $owner->surname=$request->surname;
        $owner->save();
        return redirect()->route("owners.list");
    }

    public function delete($id){
        Owner::destroy($id);
        return redirect()->route("owners.list");
    }

    public function search(Request $request){
        $request->session()->put('owner_name', $request->name);
        $request->session()->put('owner_surname', $request->surname);
        return redirect()->route('owners.list');


    }
}
