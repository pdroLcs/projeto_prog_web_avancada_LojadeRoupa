<?php

namespace App\Http\Controllers;

use App\Http\Requests\MensagemRequest;
use App\Models\Cliente;
use App\Models\Mensagem;
use Illuminate\Support\Facades\Auth;

class MensagemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mensagens = Mensagem::with('cliente')->orderBy('created_at', 'desc')->get();
        return view('mensagens.index', compact('mensagens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mensagens.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MensagemRequest $request)
    {
        $validated = $request->validated();
        Mensagem::create([
            'assunto' => $validated['assunto'],
            'mensagem' => $validated['mensagem'],
            'cliente_id' => Auth::user()->cliente->id
        ]);
        return redirect()->route('fale-conosco.create')->with('success', 'Mensagem enviada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mensagem = Mensagem::with('cliente')->findOrFail($id);
        return view('mensagens.show', compact('mensagem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mensagem = Mensagem::with('cliente')->findOrFail($id);
        return view('mensagens.edit', compact('mensagem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MensagemRequest $request, string $id)
    {
        $mensagem = Mensagem::with('cliente')->findOrFail($id);
        $mensagem->update($request->validated());
        return redirect()->route('mensagens.index')->with('success', 'Mensagem editada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Mensagem::destroy($id);
        return redirect()->route('mensagens.index')->with('success', 'Mensagem excluída com sucesso!');
    }
}
