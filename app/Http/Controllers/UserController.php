<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('clients')->paginate(10);
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('clients')->findOrFail($id);
        $clients = new LengthAwarePaginator($user->clients, count($user->clients), 15);
        return view('user.show', compact('user', 'clients'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('client')->findOrFail($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if (!is_null($request->password))
        {
            $this->validate($request, [
                'password'=>'required|min:6|max:191|confirmed'
            ]);
            $data = $data + ['password' => $request->password];
        }

        $user = User::findOrFail($id);
        $user->update($data);

        toast('Cambios correctamente aplicados.', 'success', 'top');
        return redirect()->route('user.show', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @throws \Exception
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
        } catch (ModelNotFoundException $exception) {

        }

        $user->delete();
    }

    public function table()
    {
        $users = \App\User::paginate(10);
        return view('user.table', compact('users'));
    }

    public function search(Request $request)
    {
        $users = \App\User::where('email', 'LIKE', "%{$request->search}%")
            ->orWhere('name','LIKE', "%{$request->search}%")
            ->paginate(10);
        return view('user.table', compact('users'));
    }

    protected function buildFailedValidationResponse(Request $request, array $errors)
    {
        toast('Verifique la información ingresada.', 'error', 'top');
    }
}
