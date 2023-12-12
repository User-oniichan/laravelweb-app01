@extends('pagPlantilla')
    @section('titulo')
        <h1 class='display-4'>Pagina de Lista</h1>
    @endsection
    
    @section('seccion')
    <div class="btn btn-dark fs-3 fw-bold d-grid">Detalles de estudiante</div><br/>
        <p>Id:                      {{ $xDetAlumnos->id }}         </p>
        <p>Código:                  {{ $xDetAlumnos->codEst }}         </p>
        <p>Apellidos y Nombres:     {{ $xDetAlumnos->apeEst }}, {{ $xDetAlumnos->nomEst }}         </p>
        <p>Fecha de Nacimiento:     {{ $xDetAlumnos->fnaEst }}         </p>
        <p>Turno:                   {{ $xDetAlumnos->turEst }}         </p>
        <p>Semestre:                {{ $xDetAlumnos->semEst }}         </p>
        <p>Estado de Matrícula:     {{ $xDetAlumnos->estEst }}         </p>
        

    @endsection