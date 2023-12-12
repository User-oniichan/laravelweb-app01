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

    <form action="{{ route('Estudiante.xRegistrar' )}}" method="post" class="d-grid gap-2">
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
        
        <div class="btn btn-dark fs-3 fw-bold d-grid">Agregar Estudiante</div>

        <input type="text" name="codEst" placeholder="Codigo" value="{{ old('codEst')}}" class="form-control mb-2">
        <input type="text" name="nomEst" placeholder="Nombre" value="{{ old('nomEst')}}" class="form-control mb-2">
        <input type="text" name="apeEst" placeholder="Apellido" value="{{ old('apeEst')}}" class="form-control mb-2">
        <input type="date" name="fnaEst" placeholder="Fecha de nacimiento" value="{{ old('fnaEst')}}" class="form-control mb-2">
        <select name="turMat" class="form-select mb-2">
            <option value="">Seleccione Turno</option>
            <option value="1">Turno dia</option>
            <option value="2">Turno noche</option>
            <option value="3">Turno tarde</option>
        </select>
        <select id="selectSem" name="semMat" class="form-control mb-2">
            <option value="">Seleccione su Semestre</option>
            @for($i=0;$i<=7;$i++)
                <option value="{{$i}}">Semestre {{$i}}</option>
            @endfor
        </select>
        <select id="selectTurn" name="estMat" class="form-control mb-2">
            <option value="">Seleccione</option>
            <option value="0">Inactivo</i></option>
            <option value="1">Activo</i></option>
        </select>
        <button type="submit" class="btn btn-primary">Agregar</button>

    </form>
    <br/>

    <div class="btn btn-dark fs-3 fw-bold d-grid">Lista de seguimiento</div>
    <table class="table">
      <!---------------FALTA CODIGO DE TABLA------------------>
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
        <!---<p> {{ $item->id }} {{ $item->nomEst }} </p> --->
        <tr>
          <th scope="row">{{ $item->id }}</th>
          <td>{{ $item->codEst }}</td>
          <td>
            <a href="{{ route('Estudiante.xDetalle', $item->id) }}">
              {{ $item->apeEst }}, {{ $item->nomEst }}
            </a>
          </td>
          <td>
            <form action="{{ route('Estudiante.xEliminar', $item->id) }}" method="post" class="d-inline">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
            </form>
            <a class="btn btn-warning btn-sm" href="{{ route('Estudiante.xActualizar', $item->id) }}">
                Actualizar 
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  @endsection

  @section('seccion')
      
      
      
  @endsection
    