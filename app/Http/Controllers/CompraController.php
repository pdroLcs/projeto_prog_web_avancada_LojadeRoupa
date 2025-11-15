<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompraRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Compra;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            // Se o usuário for admin → mostra todas as compras
        if (Auth::user()->isAdmin()) {
            $compras = Compra::with('cliente.user')
                            ->orderBy('created_at', 'desc')
                            ->get();
        } 
        // Se for cliente → mostra apenas as compras dele
        else {
            $compras = Compra::where('cliente_id', Auth::user()->cliente->id)
                            ->orderBy('created_at', 'desc')
                            ->get();
        }
        return view ('compras.index', compact('compras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // // 1. Busca a compra específica pelo ID, carregando os relacionamentos essenciais.
        // $compra = Compra::with(['cliente', 'itens.produto'])
        //                 ->findOrFail($id);
        
        // // 2. Regra de Negócio: Garante que o cliente só veja suas próprias compras.
        // if (Auth::user()->role !== 'admin' && $compra->user_id !== Auth::id()) {
        //     return redirect()->route('compras.index')->with('error', 'Acesso negado ao detalhe desta compra.');
        // }

        // 3. Retorna a View de detalhes.
        $compra = Compra::with(['cliente', 'itens.produto'])->findOrFail($id);
        return view('compras.show', compact('compra'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Compra::destroy($id);
        return redirect()->route('compras.index')->with('success', 'Compra removida com sucesso!');
    }
}
