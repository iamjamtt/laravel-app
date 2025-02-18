<?php

use Illuminate\Support\Facades\Route;

// importamos el controlador PersonaController
use App\Http\Controllers\PersonaController;

// importamos nuestro componente de livewire Persona
use App\Livewire\Persona;

Route::get('/', function () {
    return view('welcome');
});

// ruta para retornar la vista persona
Route::get('/personas', [PersonaController::class, 'index'])->name('personas');

// ruta para retornos a la vista de persona con livewire
Route::get('/livewire/personas', Persona::class)->name('livewire.personas');

//
