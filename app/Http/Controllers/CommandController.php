<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Car;
use App\Models\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class CommandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $commands = Command::orderBy('created_at','DESC')->get();
        return view('admin.commandes.index',compact('commands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('cars.hire');
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
            'dateR'=>'required',
            'dateL'=>'required'
        ]);
        $command = new Command();
        $location = new DateTime($request->dateL);
        $restitution = new DateTime($request->dateR);
        $jours = date_diff($location,$restitution);
        $command->prixTTC = 300 * $jours->format('%d');
        $command->dateL = $location;
        $command->dateR = $restitution;
        $command->user_id = Auth::user()->id;
        $command->car_id = Session::get('car_id');
        $command->save();
        $car = Car::find(Session::get('car_id'));
        $car->dispo = 0;
        $car->update();
        return redirect()->route('commands.create')->with(['success'=>'Réservation effectuée veuillez contactez l\'agence pour validation.']);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //
        
        $command = Command::find($id);
        $car = Car::find($command->car_id);
        $command->delete();
        $car->dispo = 1;
        $car->update();
        return redirect()->route('commands.index')->with(['success'=>'Commande supprimée']);
    }
}





