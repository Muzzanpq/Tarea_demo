<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del producto</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen p-6">
    <div class="max-w-3xl mx-auto bg-white shadow rounded-xl p-6">
        <h1 class="text-3xl font-bold mb-6">{{ $producto->nombre }}</h1>

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                @if($producto->imagen)
                    <img src="{{ $producto->imagen }}" alt="{{ $producto->nombre }}" class="w-full rounded-lg shadow">
                @else
                    <div class="w-full h-64 bg-gray-200 rounded-lg flex items-center justify-center text-gray-500">
                        Sin imagen
                    </div>
                @endif
            </div>

            <div class="space-y-3">
                <p><span class="font-semibold">Descripción:</span> {{ $producto->descripcion }}</p>
                <p><span class="font-semibold">Categoría:</span> {{ $producto->categoria }}</p>
                <p>
                    <span class="font-semibold">Precio original:</span>
                    <span class="line-through text-gray-500">${{ $producto->precio_original }}</span>
                </p>
                <p>
                    <span class="font-semibold">Precio descuento:</span>
                    <span class="text-green-600 font-bold">${{ $producto->precio_descuento }}</span>
                </p>
                <p>
                    <span class="font-semibold">Descuento:</span>
                    <span class="bg-red-500 text-white px-2 py-1 rounded">
                        -{{ $producto->porcentaje_descuento }}%
                    </span>
                </p>
                <p><span class="font-semibold">Tienda:</span> {{ $producto->tienda }}</p>

                <p>
                    <span class="font-semibold">Link:</span>
                    @if($producto->link)
                        <a href="{{ $producto->link }}" target="_blank" class="text-blue-600 underline">Abrir enlace</a>
                    @else
                        <span class="text-gray-500">Sin enlace</span>
                    @endif
                </p>
            </div>
        </div>

        <div class="mt-6 flex gap-3">
            <a href="{{ route('ofertas.index') }}" class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded-lg">
                Volver
            </a>

            <form action="{{ route('ofertas.destroy', $producto->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">
                    Eliminar
                </button>
            </form>
        </div>
    </div>
</body>
</html>