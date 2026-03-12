<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class OfertasController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->buscar;

        $productos = Producto::query()
            ->when($buscar, function ($query, $buscar) {
                $query->where('nombre', 'like', "%{$buscar}%")
                      ->orWhere('descripcion', 'like', "%{$buscar}%")
                      ->orWhere('categoria', 'like', "%{$buscar}%")
                      ->orWhere('tienda', 'like', "%{$buscar}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('ofertas.index', compact('productos', 'buscar'));
    }

    public function create()
    {
        return view('ofertas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'categoria' => 'nullable|string|max:255',
            'precio_original' => 'required|numeric|min:0',
            'precio_descuento' => 'nullable|numeric|min:0|lte:precio_original',
            'tienda' => 'nullable|string|max:255',
            'link' => 'nullable|url|max:255',
            'imagen' => 'nullable|string|max:255',
        ]);

        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'categoria' => $request->categoria,
            'precio_original' => $request->precio_original,
            'precio_descuento' => $request->precio_descuento,
            'tienda' => $request->tienda,
            'link' => $request->link,
            'imagen' => $request->imagen,
        ]);

        return redirect()->route('ofertas.index')
            ->with('success', 'Oferta creada correctamente.');
    }

    public function show($id)
    {
        $producto = Producto::findOrFail($id);

        return view('ofertas.show', compact('producto'));
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);

        return view('ofertas.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'categoria' => 'nullable|string|max:255',
            'precio_original' => 'required|numeric|min:0',
            'precio_descuento' => 'nullable|numeric|min:0|lte:precio_original',
            'tienda' => 'nullable|string|max:255',
            'link' => 'nullable|url|max:255',
            'imagen' => 'nullable|string|max:255',
        ]);

        $producto = Producto::findOrFail($id);

        $producto->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'categoria' => $request->categoria,
            'precio_original' => $request->precio_original,
            'precio_descuento' => $request->precio_descuento,
            'tienda' => $request->tienda,
            'link' => $request->link,
            'imagen' => $request->imagen,
        ]);

        return redirect()->route('ofertas.index')
            ->with('success', 'Oferta actualizada correctamente.');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('ofertas.index')
            ->with('success', 'Oferta eliminada correctamente.');
    }
}