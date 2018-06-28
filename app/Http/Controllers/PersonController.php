<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\ImportRequest;
use App\Http\Requests\PersonRequest;
use App\Person;
use App\PersonalData;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class PersonController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = Person::paginate(15);
        $people->withPath('student');
        return view('person.index', compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('person.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonRequest $request)
    {
        $this->validate($request, [
            'codigo' => 'required|unique:persona|max:30',
        ]);

        Person::create([
            'codigo' => $request->codigo,
            'nombre' => $request->nombre,
            'apaterno' => $request->apaterno,
            'amaterno' => $request->amaterno,
            'fec_nac' => $request->fec_nac,
            'tipo' => $request->tipo,
            'sexo' => $request->sexo,
        ]);

        PersonalData::create([
            'persona_codigo' => $request->codigo,
            'estado_civil' => $request->estado_civil,
            'religion' => $request->religion,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'escolaridad' => $request->escolaridad,
            'carrera_id' => $request->carrera_id,
            'domicilio' => $request->domicilio,
            'actividad_economica' => $request->actividad_economica,
            'lug_nac' => $request->lug_nac,
            'lug_res' => $request->lug_res,
        ]);

        toast('Alumno registrado correctamente.', 'success', 'top');
        return redirect()->route('student.show', $request['codigo']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $person = Person::findOrFail($id);
        return view('person.show', compact('person'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $person = Person::findOrFail($id);
        return view('person.edit', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PersonRequest $request, $id)
    {
        $person = Person::findOrFail($id);
        $personalData = $person->personalData;
        $person->update([
            'nombre' => $request->nombre,
            'apaterno' => $request->apaterno,
            'amaterno' => $request->amaterno,
            'fec_nac' => $request->fec_nac,
            'tipo' => $request->tipo,
            'sexo' => $request->sexo,
        ]);
        $personalData->update([
            'estado_civil' => $request->estado_civil,
            'religion' => $request->religion,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'escolaridad' => $request->escolaridad,
            'carrera_id' => $request->carrera_id,
            'domicilio' => $request->domicilio,
            'actividad_economica' => $request->actividad_economica,
            'lug_nac' => $request->lug_nac,
            'lug_res' => $request->lug_res,
        ]);

        toast('Actualizado correctamente.', 'success', 'top');
        return redirect()->route('student.show', compact('id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $person = Person::findOrFail($id);

        $data = $person->personalData;
        $data->delete();
        $person->delete();
    }

    public function table()
    {
        $people = Person::paginate(15);
        return view('person.table', compact('people'));
    }

    public function search(Request $request)
    {
        $people = Person::where('codigo', 'LIKE', "%{$request->search}%")
            ->orWhere(DB::raw('CONCAT(nombre," ",apaterno," ",amaterno)'), 'LIKE', "%{$request->search}%")
            ->paginate(15);
        return view('person.table', compact('people'));
    }

    public function import()
    {
        return view('person.import');
    }

    public function importing(ImportRequest $request)
    {
        $GLOBALS['people'] = array();
        $GLOBALS['codigo'] = 0;
        $GLOBALS['carrera_id'] = 0;
        $GLOBALS['exist'] = 0;
        $excel = App::make('excel');
        $excel->load($request->file, function ($reader)
        {
            $rows = $reader->get();
            $rows->each(function ($row)
            {
                $exist = Person::find($row->codigo);

                if (is_null($exist) && $row->codigo !== "" && $row->carrera !== "")
                {
                    $person = Person::create([
                        'codigo' => $row->codigo,
                        'apaterno' => $row->apepat,
                        'amaterno' => $row->apemat,
                        'nombre' => $row->nombre,
                    ]);

                    $person->personalData->update([
                        'carrera_id' => $row->carrera,
                    ]);
                    array_push($GLOBALS['people'], $person);
                }
                else
                {
                    if (!is_null($exist))
                    {
                        $GLOBALS['exist']++;
                    }
                    if ($row->codigo === "")
                    {
                        $GLOBALS['codigo']++;
                    }
                    if ($row->carrera === "")
                    {
                        $GLOBALS['carrera_id']++;
                    }
                }
            });
        });

        $people = new LengthAwarePaginator(collect($GLOBALS['people']), count($GLOBALS['people']), 15);
        $error_codigo = $GLOBALS['codigo'];
        $error_carrera = $GLOBALS['carrera_id'];
        $error_exist = $GLOBALS['exist'];
        $imported = true;

        toast('Datos importados con éxito.', 'success', 'top');
        return view('person.imported', compact('people', 'imported', 'error_codigo', 'error_carrera', 'error_exist'));
    }

    protected function buildFailedValidationResponse(Request $request, array $errors)
    {
        toast('Verifique la información ingresada.', 'error', 'top');
    }

    public function getAllAPI()
    {
        $people = Person::all();
        return $this->showAll($people);
    }

    public function buscarAlumno(Request $request){
        $alumno = Person::findOrFail($request['codigo']);

        return $this->showOne($alumno);
    }
}
