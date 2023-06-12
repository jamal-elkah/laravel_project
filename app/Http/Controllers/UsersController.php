<?php

namespace App\Http\Controllers;


use App\Models\Car;
use App\Models\User;
use App\Models\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::orderBy('created_at','DESC')->where('isAdmin', 0)->get();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.register');
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'tel' => 'required',
            'ville' => 'required',
        ]);
        $user = new User();
        $user->nom = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->tel = $request->tel;
        $user->ville = $request->ville;
        $user->save();
        return redirect()->route('home')->with(['success'=>'Compte Crée']);
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
        $user = Auth::user();
        return view('users.profile',compact('user'));
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
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.index')->with(['success'=>'Utilisateur supprimé']);
    }
    public function login(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed...
            return redirect()->route('home');
        }else{
            return redirect()->route('users.login')->with(['fail'=>'Email ou mot de passe est incorrect']);
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
    public function deleteCommand(Request $request,$id){
        $command = Command::find($id);
        $command->delete();
        $car = Car::find($request->car_id);
        $car->dispo = 1;
        $car->update();
        return redirect()->back();
    }
}





