<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class OfertasController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('ofertas.index', compact('productos'));
    }

    public function create()
    {
        return view('ofertas.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'categoria' => 'nullable|string|max:255',
            'precio_original' => 'required|numeric|min:0',
            'precio_descuento' => 'required|numeric|min:0',
            'tienda' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:255',
            'imagen' => 'nullable|string|max:255',
        ]);

        if ($datos['precio_original'] > 0) {
            $datos['porcentaje_descuento'] = round(
                (($datos['precio_original'] - $datos['precio_descuento']) / $datos['precio_original']) * 100
            );
        } else {
            $datos['porcentaje_descuento'] = 0;
        }

        Producto::create($datos);

        return redirect()->route('ofertas.index')
            ->with('success', 'Producto agregado correctamente');
    }

    public function show(Producto $oferta)
    {
        return view('ofertas.show', ['producto' => $oferta]);
    }

    public function destroy(Producto $oferta)
    {
        $oferta->delete();

        return redirect()->route('ofertas.index')
            ->with('success', 'Producto eliminado correctamente');
    }
}