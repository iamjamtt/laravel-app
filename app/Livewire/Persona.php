<?php

namespace App\Livewire;

// importamos el modelo Persona con el alias ModelsPersona
// para evitar conflictos con el nombre de la clase Persona de nuestro componente
use App\Models\Persona as ModelsPersona;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Persona extends Component
{
    // Definimos las variables del modelo
    public $id_per;

    // Definimos las variables del formulario
    #[Validate('required|min:3')] // Validamos que el campo sea requerido y tenga un mínimo de 3 caracteres
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

    // Definimos la variable para el modo de edición
    public $modoEditar = false;

    public function render()
    {
        // obtenemos todos los registros de la tabla personas
        $todasLasPersonas = ModelsPersona::all();

        return view('livewire.persona', [
            'todasLasPersonas' => $todasLasPersonas
        ]);
    }

    public function crearPersona()
    {
        // Validamos los campos del formulario
        $this->validate([
            'nombres' => 'required|min:3',
            'apellidos' => 'required',
            'fecha_nacimiento' => 'required',
            'genero' => 'required',
            'correo' => 'required|email',
            'direccion' => 'required',
        ]);

        // Creamos una nueva instancia del modelo Persona
        $persona = new ModelsPersona();
        $persona->nombres_per = $this->nombres;
        $persona->apellidos_per = $this->apellidos;
        $persona->fecha_nacimiento_per = $this->fecha_nacimiento;
        $persona->genero_per = $this->genero;
        $persona->correo_per = $this->correo;
        $persona->direccion_per = $this->direccion;
        // Guardamos la persona
        $persona->save();

        // Limpiamos los campos del formulario
        $this->reset();

        // Mostramos un mensaje de éxito
        session()->flash('mensaje', 'Persona creada correctamente');
    }

    public function actualizarPersona()
    {
        // Validamos los campos del formulario
        $this->validate([
            'nombres' => 'required|min:3',
            'apellidos' => 'required',
            'fecha_nacimiento' => 'required',
            'genero' => 'required',
            'correo' => 'required|email',
            'direccion' => 'required',
        ]);

        // Creamos una nueva instancia del modelo Persona
        $persona = ModelsPersona::find($this->id_per);
        $persona->nombres_per = $this->nombres;
        $persona->apellidos_per = $this->apellidos;
        $persona->fecha_nacimiento_per = $this->fecha_nacimiento;
        $persona->genero_per = $this->genero;
        $persona->correo_per = $this->correo;
        $persona->direccion_per = $this->direccion;
        // Guardamos la persona
        $persona->save();

        // Limpiamos los campos del formulario
        $this->reset();

        // Mostramos un mensaje de éxito
        session()->flash('mensaje', 'Persona actualizada correctamente');
    }

    public function cargarDatos($id_per)
    {
        // Buscamos la persona por su id
        $persona = ModelsPersona::find($id_per);

        // Guardamos el id de la persona
        $this->id_per = $persona->id_per;

        // Cargamos los datos de la persona en el formulario
        $this->nombres = $persona->nombres_per;
        $this->apellidos = $persona->apellidos_per;
        $this->fecha_nacimiento = $persona->fecha_nacimiento_per;
        $this->genero = $persona->genero_per;
        $this->correo = $persona->correo_per;
        $this->direccion = $persona->direccion_per;

        // Cambiamos el modo a editar
        $this->modoEditar = true;
    }

    public function eliminarPersona($id_per)
    {
        // Buscamos la persona por su id
        $persona = ModelsPersona::find($id_per);

        // Eliminamos la persona
        $persona->delete();

        // Mostramos un mensaje de éxito
        session()->flash('mensaje', 'Persona eliminada correctamente');
    }
}
