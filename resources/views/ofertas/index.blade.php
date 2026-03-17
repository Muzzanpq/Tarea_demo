<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ofertas</title>
</head>
<body>
    <h1>Menu</h1>

    @if(session('success'))
        <p style= "color: green">{{session('success')}}</p>
    @endif

    <a href="{{route('ofertas.create')}}">Agregar Nuevos Productos</a>
    <div>
        <table borde="1" cellpadding= "10">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Descirpcion</th>
                    <th>Precio original</th>
                    <th>Precio descuento</th>
                    <th>Descuento</th>
                    <th>Tienda</th>
                    <th>Link</th>
                </tr>
            </thead>
            <tbody>
                @forelse($productos as $productos)
                    <tr>
                        <td>{{ $productos->id }}</td>
                        <td>{{ $productos->nombre }}</td>
                        <td>{{ $productos->categoria }}</td>
                        <td>{{ $productos->descripcion }}</td>
                        <td>{{ $productos->precio_original }}</td>
                        <td>{{ $productos->precio_descuento }}</td>
                        <td>{{ $productos->descuento }}</td>
                        <td>{{ $productos->tienda }}</td>
                        <td>{{ $productos->link }}</td>

                    </tr>
            </tbody>
        </table>
    </div>
</body>
</html>