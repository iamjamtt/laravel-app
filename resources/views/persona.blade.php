<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Personas
    </title>
</head>
<body>
    <h1>
        Vista Personas
    </h1>
    <br>
    <h2>
        1. Listado de todas las Personas
    </h2>
    @foreach ($todasLasPersonas as $item)
        - {{ $item->nombres_per }} {{ $item->apellidos_per }}, vive en {{ $item->direccion_per }} <br>
    @endforeach
    <br>
    <h2>
        2. Listado de todas las Personas de Genero Masculino
    </h2>
    @foreach ($personasGeneroMasculino as $item)
        - {{ $item->nombres_per }} {{ $item->apellidos_per }}, vive en {{ $item->direccion_per }} <br>
    @endforeach
    <br>
    <h2>
        3. Persona con el ID 2
    </h2>
    <p>
        - {{ $persona2->nombres_per }} {{ $persona2->apellidos_per }}, vive en {{ $persona2->direccion_per }}
    </p>
</body>
</html>
