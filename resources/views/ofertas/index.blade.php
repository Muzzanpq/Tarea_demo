<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ofertas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen p-6">

    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Lista de Productos</h1>

            <a href="{{ route('ofertas.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
                Nuevo Producto
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow rounded-xl overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-200 text-gray-800 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Nombre</th>
                        <th class="px-4 py-3">Descripción</th>
                        <th class="px-4 py-3">Categoría</th>
                        <th class="px-4 py-3">Precio original</th>
                        <th class="px-4 py-3">Precio descuento</th>
                        <th class="px-4 py-3">% Descuento</th>
                        <th class="px-4 py-3">Tienda</th>
                        <th class="px-4 py-3">Link</th>
                        <th class="px-4 py-3">Imagen</th>
                        <th class="px-4 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($productos as $producto)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $producto->id }}</td>
                            <td class="px-4 py-3 font-semibold">{{ $producto->nombre }}</td>
                            <td class="px-4 py-3">{{ $producto->descripcion }}</td>
                            <td class="px-4 py-3">{{ $producto->categoria }}</td>

                            <td class="px-4 py-3">
                                <span class="line-through text-gray-500">
                                    ${{ $producto->precio_original }}
                                </span>
                            </td>

                            <td class="px-4 py-3 text-green-600 font-bold">
                                ${{ $producto->precio_descuento }}
                            </td>

                            <td class="px-4 py-3">
                                <span class="bg-red-500 text-white px-2 py-1 rounded text-xs font-semibold">
                                    -{{ $producto->porcentaje_descuento }}%
                                </span>
                            </td>

                            <td class="px-4 py-3">{{ $producto->tienda }}</td>

                            <td class="px-4 py-3">
                                @if($producto->link)
                                    <a href="{{ $producto->link }}" target="_blank" class="text-blue-600 hover:underline">
                                        Ver enlace
                                    </a>
                                @else
                                    <span class="text-gray-400">Sin enlace</span>
                                @endif
                            </td>

                            <td class="px-4 py-3">
                                @if($producto->imagen)
                                    <img src="{{ $producto->imagen }}" alt="{{ $producto->nombre }}" class="w-20 h-20 object-cover rounded">
                                @else
                                    <span class="text-gray-400">Sin imagen</span>
                                @endif
                            </td>

                            <td class="px-4 py-3">
                                <div class="flex gap-2">
                                    <a href="{{ route('ofertas.show', $producto->id) }}"
                                       class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                                        Ver
                                    </a>

                                    <form action="{{ route('ofertas.destroy', $producto->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="px-4 py-6 text-center text-gray-500">
                                No hay productos registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>