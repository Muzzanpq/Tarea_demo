<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar producto</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen p-6">
    <div class="max-w-2xl mx-auto bg-white shadow rounded-xl p-6">
        <h1 class="text-2xl font-bold mb-6">Agregar producto</h1>

        <form action="{{ route('ofertas.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block font-medium mb-1">Nombre</label>
                <input type="text" name="nombre" class="w-full border rounded-lg px-3 py-2" required>
            </div>

            <div>
                <label class="block font-medium mb-1">Descripción</label>
                <textarea name="descripcion" class="w-full border rounded-lg px-3 py-2"></textarea>
            </div>

            <div>
                <label class="block font-medium mb-1">Categoría</label>
                <input type="text" name="categoria" class="w-full border rounded-lg px-3 py-2">
            </div>

            <div>
                <label class="block font-medium mb-1">Precio original</label>
                <input type="number" step="0.01" name="precio_original" class="w-full border rounded-lg px-3 py-2" required>
            </div>

            <div>
                <label class="block font-medium mb-1">Precio con descuento</label>
                <input type="number" step="0.01" name="precio_descuento" class="w-full border rounded-lg px-3 py-2" required>
            </div>

            <div>
                <label class="block font-medium mb-1">Tienda</label>
                <input type="text" name="tienda" class="w-full border rounded-lg px-3 py-2">
            </div>

            <div>
                <label class="block font-medium mb-1">Link</label>
                <input type="text" name="link" class="w-full border rounded-lg px-3 py-2">
            </div>

            <div>
                <label class="block font-medium mb-1">Imagen URL</label>
                <input type="text" name="imagen" class="w-full border rounded-lg px-3 py-2">
            </div>

            <div class="flex gap-3 pt-2">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">
                Agregar producto
            </button>

            <a href="{{ route('ofertas.index') }}" class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded-lg">
                Volver
            </a>
            </div>
        </form>
    </div>
</body>
</html>