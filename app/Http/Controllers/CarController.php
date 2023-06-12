<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
        return view('cars.index',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.cars.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'marque' => 'required',
            'model' => 'required',
            'type' => 'required',
            'prix' => 'required',
            'photo' => 'required',
        ]);
        if($request->hasFile('photo')){
            $car = new Car();
            $car->marque = $request->marque;
            $car->model = $request->model;
            $car->type = $request->type;
            $car->prixJ = $request->prix;
            $car->dispo = $request->dispo;
            $file = $request->file('photo');
            $name = $file->getClientOriginalName();
            $file->move(public_path('images'),$name);
            $car->image = $name;
            $car->save();
            return redirect()->route('admin.index')->with(['success'=>'Voiture Ajoutée']);
        }
        return redirect()->route('admin.index')->with(['fail'=>'Erreur veuillez réessayer']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $car = Car::find($id);
        return view('cars.view',compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          //
        $car = Car::find($id);
        return view('admin.cars.edit',compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'marque' => 'required',
            'model' => 'required',
            'type' => 'required',
            'prixJ' => 'required'
        ]);
        $car = Car::find($id);
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $name = $file->getClientOriginalName();
            $file->move(public_path('images'),$name);
            $car->image = $name;
        }
        $car->marque = $request->marque;
        $car->model = $request->model;
        $car->type = $request->type;
        $car->prixJ = $request->prixJ;
        $car->dispo = $request->dispo;
        $car->update();
        return redirect()->route('admin.index')->with(['success'=>'Voiture Modifiée']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $car = Car::find($id);
        unlink(public_path('images/'.$car->image));
        $car->delete();
        return redirect()->route('admin.index')->with(['success'=>'Voiture Supprimée']);
    }
}




