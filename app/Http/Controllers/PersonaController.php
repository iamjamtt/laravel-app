<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    // metodo para retornar la vista persona
    public function index()
    {
        // obtenemos todos los registros de la tabla personas
        $todasLasPersonas = Persona::all();

        // obtenemos los registros de la tabla personas que tengan el genero MASCULINO
        $personasGeneroMasculino = Persona::query()
            ->where('genero_per', 'MASCULINO')
            ->get();

        // obtenemos los datos de la persona por su id
        $persona2 = Persona::find(2);

        // retornamos la vista persona
        // return view('persona', compact('todasLasPersonas', 'personasGeneroMasculino', 'persona1'));
        return view('persona', [
            'todasLasPersonas' => $todasLasPersonas,
            'personasGeneroMasculino' => $personasGeneroMasculino,
            'persona2' => $persona2
        ]);
    }
}
