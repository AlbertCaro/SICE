<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ClientRequest;
use http\Env\Response;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::with('user')->paginate(10);
        return view('client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
        Client::create([
            'name' => $request->name,
            'redirect' => $request->redirect
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Client $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('client.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Client $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ClientRequest $request
     * @param Client $client
     * @return Response
     */
    public function update(ClientRequest $request, Client $client)
    {
        $client->update($request->all());
        toast('Actualizado correctamente', 'success', 'top');
        return redirect()->route('client.show', compact('client'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client $client
     * @return void
     * @throws \Exception
     */
    public function destroy(Client $client)
    {
        $client->delete();
    }

    public function table()
    {
        $clients = Client::with('user')->paginate(10);
        return view('client.table', compact('clients'));
    }

    public function search(Request $request)
    {
        $clients = Client::with('user')->where('name','LIKE', "%{$request->search}%")
            ->paginate(10);
        return view('client.table', compact('clients'));
    }

    public function revoke(Client $client)
    {
        if ($client->revoked === 0) {
            $client->update(['revoked' => 1]);
            toast('Acceso revocado', 'success', 'top');
        } else {
            $client->update(['revoked' => 0]);
            toast('Acceso concedido', 'success', 'top');
        }
        return redirect()->route('client.show', $client);
    }

    protected function buildFailedValidationResponse(Request $request, array $errors)
    {
        toast('Verifique la información ingresada.', 'error', 'top');
    }
}
