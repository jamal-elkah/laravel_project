<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Car::orderBy('created_at', 'DESC')->get();
        $dispo = Car::orderBy('created_at', 'DESC')->whereDispo(1)->get();
        return view('index', compact('cars', 'dispo'));
    }
    public function search(Request $request)
    {
        $cars = Car::orderBy('created_at', 'DESC')->where('marque','like', '%' . $request->marque . '%')->get();
        $marque = $request->marque;
        $dispo = Car::orderBy('created_at', 'DESC')->whereDispo(1)->get();
        return view('index', compact('cars', 'dispo', 'marque'));
    }
}
