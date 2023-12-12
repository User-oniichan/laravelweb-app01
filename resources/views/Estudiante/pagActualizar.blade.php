@extends('pagPlantilla')
  @section('titulo')
    <h1 class='display-4'>Pagina de Lista</h1>
  @endsection

  @section('seccion')
    @if(session('msj'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('msj') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="close"></button>
        </div>
    @endif

    <form action="{{ route('Estudiante.xUpdate', $xActAlumnos->id ) }}" method="post" class="d-grid gap-2">
        @method('PUT')
        @csrf

        @error('codEst')
            <div class="alert alert-danger">
                Código REQUERIDO
            </div>
        @enderror

        @error('nomEst')
            <div class="alert alert-danger">
                Nombre REQUERIDO
            </div>
        @enderror

        @if($errors->has('apeEst'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Apellido</strong> REQUERIDO
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <div class="btn btn-dark fs-3 fw-bold d-grid">Modificar Estudiante</div>

        <input type="text" name="codEst" placeholder="Codigo" value="{{ $xActAlumnos->codEst }}" class="form-control mb-2">
        <input type="text" name="nomEst" placeholder="Nombre" value="{{ $xActAlumnos->nomEst }}" class="form-control mb-2">
        <input type="text" name="apeEst" placeholder="Apellido" value="{{ $xActAlumnos->apeEst }}" class="form-control mb-2">
        <input type="text" name="fnaEst" placeholder="AAAA/MM/DD" value="{{ $xActAlumnos->fnaEst }}" class="form-control mb-2">
        <select id="selectTur" name="turMat" class="form-select mb-2">
            <option value="">Seleccione Turno</option>
            <option value="1" @if ($xActAlumnos->turMat == 1) {{ "SELECTED" }} @endif>Turno dia(1)</option>
            <option value="2" @if ($xActAlumnos->turMat == 2) {{ "SELECTED" }} @endif>Turno noche(2)</option>
            <option value="3" @if ($xActAlumnos->turMat == 3) {{ "SELECTED" }} @endif>Turno tarde(3)</option>
        </select>
        <select name="semMat" class="form-control mb-2">
            <option value="">Seleccione su Semestre</option>
            @for($i=0;$i<=7;$i++)
                <option value="{{$i}}" @if ($xActAlumnos->semMat == $i) {{ "SELECTED" }} @endif>Semestre {{$i}}</option>
            @endfor
        </select>
        <select name="estMat" class="form-control mb-2">
            <option value="">Seleccione</option>
            <option value="0" @if ($xActAlumnos->estMat == 0) {{ "SELECTED" }} @endif>Inactivo</i></option>
            <option value="1" @if ($xActAlumnos->estMat == 1) {{ "SELECTED" }} @endif>Activo</i></option>
        </select>
        <button type="submit" class="btn btn-warning">Actualizar</button>

    </form>
    <br/>

    <div class="btn btn-dark fs-3 fw-bold d-grid">Lista de seguimiento</div>
    <table class="table">
      <!------------------------------------------------------------------->
    </table>
    <h3>Lista</h3>
    <table class="table">
      <thead class="table-light">
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Código</th>
          <th scope="col">Apellidos y Nombres</th>
          <th scope="col">Editar datos</th>
        </tr>
      </thead>
      <tbody>
        @foreach($xAlumnos as $item)
        <tr>
          <th scope="row">{{ $item->id }}</th>
          <td>{{ $item->codEst }}</td>
          <td>
            <a href="{{ route('Estudiante.xDetalle', $item->id) }}">{{ $item->apeEst }}, {{ $item->nomEst }}</a>
          </td>
          <td>
            <a class="btn btn-warning btn-sm" href="{{ route('Estudiante.xActualizar', $item->id) }}">
                Actualizar 
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $xAlumnos->links() }}
  @endsection

  @section('seccion')
      
      
      
  @endsection
    