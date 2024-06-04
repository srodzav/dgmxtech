<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::all();
        return response()->json($pedidos, 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'estatus' => 'required|boolean',
        ]);
        $pedido = Pedido::create($validatedData);
        return response()->json($pedido, 201);
    }

    public function update(Request $request, Pedido $pedido)
    {
        $pedido->update(['estatus' => 1]);
        return response()->json($pedido, 200);

    }
}
