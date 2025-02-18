<div class="p-4">
    <!-- Si existe un mensaje en la sesion lo mostramos -->
    @if (session()->has('mensaje'))
        <div class="alert alert-success" role="alert">
            {{ session('mensaje') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <span class="fw-bold fs-4">
                Formulario de Persona
            </span>
        </div>
        <div class="card-body">
            <form class="row g-3" wire:submit="{{ $modoEditar ? 'actualizarPersona' : 'crearPersona' }}">
                <!-- Nombres -->
                <div class="col-md-6">
                    <label for="nombres" class="form-label">
                        Nombres
                    </label>
                    <input
                        type="text"
                        wire:model.live="nombres"
                        class="form-control @error('nombres') is-invalid @enderror"
                        id="nombres"
                        placeholder="Ingrese su nombre"
                    >
                    @error('nombres')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- Apellidos -->
                <div class="col-md-6">
                    <label for="apellidos" class="form-label">
                        Apellidos
                    </label>
                    <input type="text" wire:model.live="apellidos" class="form-control" id="apellidos" placeholder="Ingrese su apellido">
                    @error('apellidos')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- Fecha de Nacimiento -->
                <div class="col-md-6">
                    <label for="fecha_nacimiento" class="form-label">
                        Fecha de Nacimiento
                    </label>
                    <input type="date" wire:model.live="fecha_nacimiento" class="form-control" id="fecha_nacimiento">
                    @error('fecha_nacimiento')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- Genero -->
                <div class="col-md-6">
                    <label for="genero" class="form-label">
                        Genero
                    </label>
                    <select class="form-select" wire:model.live="genero" id="genero">
                        <option value="">Seleccione su genero</option>
                        <option value="MASCULINO">Masculino</option>
                        <option value="FEMENINO">Femenino</option>
                    </select>
                    @error('genero')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- Correo -->
                <div class="col-md-6">
                    <label for="correo" class="form-label">
                        Correo
                    </label>
                    <input type="email" wire:model.live="correo" class="form-control" id="correo" placeholder="Ingrese su correo">
                    @error('correo')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- Direccion -->
                <div class="col-md-6">
                    <label for="direccion" class="form-label">
                        Direccion
                    </label>
                    <input type="text" wire:model.live="direccion" class="form-control" id="direccion" placeholder="Ingrese su direccion">
                    @error('direccion')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- Button -->
                <div class="col-12">
                    @if ($modoEditar === true)
                        <button type="submit" class="btn btn-primary">
                            Actualizar Persona
                        </button>
                    @else
                        <button type="submit" class="btn btn-success">
                            Crear Persona
                        </button>
                    @endif
                </div>
            </form>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header">
            <span class="fw-bold fs-4">
                Listado de Persona
            </span>
        </div>
        <div class="card-body">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombres y Apellidos</th>
                        <th scope="col">Correo</th>
                        <th scope="col">F. Nacimiento</th>
                        <th scope="col">Genero</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($todasLasPersonas as $item)
                        <tr wire:key="{{ $item->id_per }}">
                            <th scope="row">{{ $item->id_per }}</th>
                            <td>{{ $item->nombres_per }} {{ $item->apellidos_per }}</td>
                            <td>{{ $item->correo_per }}</td>
                            <td>
                                {{ date('d/m/Y', strtotime($item->fecha_nacimiento_per)) }}
                            </td>
                            <td>{{ $item->genero_per }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Opciones
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a
                                                class="dropdown-item"
                                                style="cursor: pointer"
                                                wire:click="cargarDatos({{ $item->id_per }})"
                                            >
                                                Editar
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                class="dropdown-item"
                                                style="cursor: pointer"
                                                wire:click="eliminarPersona({{ $item->id_per }})"
                                                wire:confirm="¿Estas seguro de eliminar a {{ $item->nombres_per }} {{ $item->apellidos_per }}?"
                                            >
                                                Eliminar
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
