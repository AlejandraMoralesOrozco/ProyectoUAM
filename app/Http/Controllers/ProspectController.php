<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prospect;
use App\Models\Area;
use RealRashid\SweetAlert\Facades\Alert;

class ProspectController extends Controller
{
    
    public function showForm(){
        $areas = Area::all();
        return view('prospect.form', compact('areas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'mother_lastname' => '',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:10',
            'cv' => 'required|mimes:pdf|max:2048', 
            'areas' => 'required|array|min:1', 
            'areas.*' => 'exists:areas,id', 
    ]);

    // Guardar los datos en la base de datos
    $prospect = new Prospect();
    $prospect->name = $request->input('name');
    $prospect->lastname = $request->input('lastname');
    $prospect->mother_lastname = $request->input('mother_lastname');
    $prospect->email = $request->input('email');
    $prospect->phone = $request->input('phone');

    // Guardar el archivo PDF
    $cvPath = $request->file('cv')->store('cv', 'public');
    $prospect->cv = $cvPath;

    $prospect->save();

    // Asociar las áreas seleccionadas con el prospecto
    $prospect->areas()->attach($request->input('areas'));

    Alert::success('¡Postulación exitosa!', 'Tu postulación se ha enviado correctamente.');
    
    return redirect('/')->with('success', '¡Postulación exitosa! Tu postulación se ha enviado correctamente.');
    }

}

