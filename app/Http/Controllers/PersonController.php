<?php

namespace App\Http\Controllers;

use App\Career;
use App\Http\Requests\ImportRequest;
use App\Http\Requests\PersonRequest;
use App\Person;
use App\PersonalData;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel;

class PersonController extends Controller
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
        $excel = App::make('excel');
        $excel->load($request->file, function ($reader) {
            $rows = $reader->get();
            $rows->each(function ($row) {
                $person = Person::create([
                    'codigo' => $row->codigo,
                    'apaterno' => $row->apepat,
                    'amaterno' => $row->apemat,
                    'nombre' => $row->nombre,
                ]);

                $person->personalData->update([
                    'carrera_id' => $row->carrera,
                ]);
            });
        });
        toast('Datos importados con éxito.', 'success', 'top');
        return redirect()->route('student.index');
    }

    protected function buildFailedValidationResponse(Request $request, array $errors)
    {
        toast('Verifique la información ingresada.', 'error', 'top');
    }
}
