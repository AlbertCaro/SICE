<?php

namespace App\Http\Controllers;

use App\Career;
use App\Person;
use App\PersonalData;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function store(Request $request)
    {
        //
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
       // dd($person->personalData);
        //$data = PersonalData::where('persona_codigo', '=', "{$id}")->firstOrFail();
        $career = Career::findOrFail($person->personalData->carrera_id)->carrera;
        return view('person.show', compact('person', 'career'));
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
    public function update(Request $request, $id)
    {
        $person = Person::findOrFail($id);
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

}
