<?php

namespace App\Http\Controllers;

use App\Models\Estudiantes;
use Illuminate\Http\Request;

/*----------------------------------------------------------------*/

use App\Http\Requests\AlumnosFormRequest as RequestsAlumnosFormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PagesController extends Controller
{
    public function fnInicio() {
        return view('welcome');
    }

    public function fnEstDetalle($id) {
        $xDetAlumnos = Estudiantes::findOrFail($id);
        return view('Estudiante.pagDetalle', compact('xDetAlumnos'));
    }

    public function fnLista() {
        $xAlumnos = Estudiantes::all();
        $xAlumnos = Estudiantes::paginate(4);
        return view('pagLista', compact('xAlumnos'));
    }

    public function fnEstActualizar($id) {
        $xActAlumnos = Estudiantes::findOrFail($id);
        return view('Estudiante.pagActualizar', compact('xActAlumnos'));
    }

    public function fnUpdate(Request $request, $id) {
        $xUpdateAlumnos = Estudiantes::findOrFail($id);

        $xUpdateAlumnos -> codEst = $request -> codEst;
        $xUpdateAlumnos -> nomEst = $request -> nomEst;
        $xUpdateAlumnos -> apeEst = $request -> codEst;
        $xUpdateAlumnos -> fnaEst = $request -> fnaEst;
        $xUpdateAlumnos -> turMat = $request -> turMat;
        $xUpdateAlumnos -> semMat = $request -> semMat;
        $xUpdateAlumnos -> estMat = $request -> estMat;

        $xUpdateAlumnos -> save();
        $xAlumnos = Estudiantes::all();
        return view('pagLista', compact('xAlumnos'));
        return back() -> with('msj', 'Se actualizo con éxito');
    }

    public function fnEliminar($id) {
        $deleteAlumno = Estudiantes::findOrFail($id);
        $deleteAlumno->delete();
        return back()->with('msj','Se eliminó con éxito');
    }

    public function fnGaleria($numero=0) {
        $valor = $numero;
        $otro = 25;
        return view('pagGaleria', compact('valor', 'otro'));
    }

    public function fnRegistrar (Request $request) {
        $request -> validate ([
            'codEst'=>'required',
            'nomEst'=>'required',
            'apeEst'=>'required',
            'fnaEst'=>'required',
            'turMat'=>'required',
            'semMat'=>'required',
            'estMat'=>'required'
        ]);

        $nuevoEstudiante = new Estudiantes();

        $nuevoEstudiante->codEst = $request->codEst;
        $nuevoEstudiante->nomEst = $request->nomEst;
        $nuevoEstudiante->apeEst = $request->apeEst;
        $nuevoEstudiante->fnaEst = $request->fnaEst;
        $nuevoEstudiante->turMat = $request->turMat;
        $nuevoEstudiante->semMat = $request->semMat;
        $nuevoEstudiante->estMat = $request->estMat;

        $nuevoEstudiante->save();

        return back()->with('msj', 'Se registró con exito');
    }
/*----------------------------------------------------------------*/
    public function __construct()
    {
        
    }

    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $estudiantes=DB::table('estudiantes')->where('nombre','LIKE','%'.$query.'%')->where ('condicion', '=', '1')->orderBy('idEst');
            return view('datos.alumno.index', ["datosalumno"=>$estudiantes, "searchText"=>$query]);
        }
    }

    public function create()
    {
        return view('datos.alumno.create');
    }

    public function store(RequestsAlumnosFormRequest $request)
    {
        $estudiantes=new Estudiantes;
        $estudiantes->codEst=$request->get('codigo');
        $estudiantes->nomEst=$request->get('nombres');
        $estudiantes->apeEst=$request->get('apellidos');
        $estudiantes->fnaEst=$request->get('nacimiento');
        $estudiantes->modMat=$request->get('modalidad');
        $estudiantes->turMat=$request->get('turno');
        $estudiantes->semMat=$request->get('semestre');
        $estudiantes->estMat=$request->get('estado');
        $estudiantes->condicion='1';
        $estudiantes->save();
        return Redirect::to('datos/alumno');
    }

    public function show($id)
    {
        return view("datos.alumno.show", ["estudiantes"=>Estudiantes::findOrFail($id)]);
    }
    
    public function edit($id)
    {
        return view("datos.alumno.edit", ["estudiantes"=>Estudiantes::findOrFail($id)]);
    }

    public function update(RequestsAlumnosFormRequest $request,$id)
    {
        $estudiantes=Estudiantes::findOrFail($id);
        $estudiantes->codEst=$request->get('codigo');
        $estudiantes->nomEst=$request->get('nombres');
        $estudiantes->apeEst=$request->get('apellidos');
        $estudiantes->fnaEst=$request->get('nacimiento');
        $estudiantes->modMat=$request->get('modalidad');
        $estudiantes->turMat=$request->get('turno');
        $estudiantes->semMat=$request->get('semestre');
        $estudiantes->estMat=$request->get('estado');
        $estudiantes->update();
        return Redirect::to('datos/alumno');
    }
    
    public function destroy($id)
    {
       $estudiantes=Estudiantes::finOrFail($id);
       $estudiantes->condicion='0';
       $estudiantes->update();
       return Redirect::to('datos/alumno');
    }
}
