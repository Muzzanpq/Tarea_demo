<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ofertas</title>
</head>
<body>
    <h1>Ofertas</h1>

    @if(session('success'))
        <p style= "color: green">{{session('succes')}}</p>
    @efdif

    <a href="{{route('ofertas.agregarP'}}">Nuevo Producto</a>
    <table borde="1" cellpadding= "10">
        <thead>
            <tr>
                <th>ID</th>
                <th></th>
            </tr>
        </thead>
    </table>

</body>
</html>