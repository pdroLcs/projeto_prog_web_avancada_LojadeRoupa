<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClienteRequest $request)
    {
        Cliente::create($request->validated());
        return redirect()->route('clientes.index')->with('success', 'Cliente cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClienteRequest $request, string $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->validated());
        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->destroy();
        return redirect()->route('clientes.index')->with('sucess', 'Cliente excluído com sucesso');
    }
}
