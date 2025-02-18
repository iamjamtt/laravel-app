<?php

namespace App\Livewire;

// importamos el modelo Persona con el alias ModelsPersona
// para evitar conflictos con el nombre de la clase Persona de nuestro componente
use App\Models\Persona as ModelsPersona;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Persona extends Component
{
    #[Validate('required|min:3')]
    public string $nombres = '';
    #[Validate('required')]
    public string $apellidos = '';
    #[Validate('required')]
    public string $fecha_nacimiento = '';
    #[Validate('required')]
    public $genero;
    #[Validate('required|email')]
    public string $correo = '';
    #[Validate('required')]
    public string $direccion = '';

    public function render()
    {
        return view('livewire.persona');
    }

    public function guardarPersona()
    {
        $this->validate([
            'nombres' => 'required|min:3',
            'apellidos' => 'required',
            'fecha_nacimiento' => 'required',
            'genero' => 'required',
            'correo' => 'required|email',
            'direccion' => 'required',
        ]);

        $persona = new ModelsPersona();
        $persona->nombres_per = $this->nombres;
        $persona->apellidos_per = $this->apellidos;
        $persona->fecha_nacimiento_per = $this->fecha_nacimiento;
        $persona->genero_per = $this->genero;
        $persona->correo_per = $this->correo;
        $persona->direccion_per = $this->direccion;
        $persona->save();

        $this->reset();

        session()->flash('mensaje', 'Persona guardada correctamente');
    }
}
