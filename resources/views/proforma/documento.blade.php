<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .tabla1{
            border: solid 1px #000;
            padding: 20px;
            width: 100%;
            margin-top: 75;
            
        }
        .tabla2{
            border: solid 1px #000;
            padding: 10px;
            width: 100%;
        }
        .tabla1 th, .tabla2 th, .tabla3 th, .tabla1 td, .tabla2 td, .tabla3 td {
            border: 1px solid #ddd;
            padding: 1px;
            text-align: left;
        }
        .tabla3{
            border: solid 1px #000;
            padding: 20px;
            width: 100%;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    
    <table class="tabla1">
        <tr>
            <td>DATOS DEL CLIENTE</td>
            <td>DATOS DEL VENDEDOR</td>
        </tr>
        <tr>
            <td>Nombres: <span class="linea">{{$cliente['nombre']}}</span></td>
            <td>Nombres: <span class="linea">{{$asesor['nombre']}}</span></td>
        </tr>
        <tr>
            <td>DNI: <span class="linea">{{$cliente['dni']}}</span></td>
            <td>DNI: <span class="linea">{{$asesor['dni']}}</span></td>
        </tr>
        <tr>
            <td>Dirección: <span class="linea">{{$cliente['direccion']}}</span></td>
            <td>Dirección: <span class="linea">{{$asesor['direccion']}}</span></td>
        </tr>
        <tr>
            <td>Teléfono: <span class="linea">{{$cliente['telefono']}}</span></td>
            <td>Teléfono: <span class="linea">{{$asesor['telefono']}}</span></td>
        </tr>
        <tr>
            <td>Email: <span class="linea">{{$cliente['email']}}</span></td>
            <td>Email: <span class="linea">{{$asesor['email']}}</span></td>
        </tr>
    </table>
    <h4>Nombre del Proyecto: {{$proyecto['nombre']}}</h4>
    <table class="tabla2">
        
        <tr>
            <td>Descripción</td>
            <td>{{$nombre}}</td>
            <td>Precio</td>
            <td>S/. {{$precio}}</td>
        </tr>
        <tr>
            <td>Área</td>
            <td>{{$area}} m2</td>
            <td>Inicial</td>
            <td>S/. {{$inicial}}</td>
        </tr>
        <tr>
            <td>Plazo</td>
            <td>{{$plazo}} Meses</td>
            <td>Bono</td>
            <td>S/. {{$bono}}</td>
        </tr>
        <tr>
            <td>Tasa de Interes:</td>
            <td>{{$interes}} %</td>
            <td>Cuotas Mensuales:</td>
            <td>S/. {{$cuota_men}}</td>
        </tr>

        <h3>Saldo a Financiar: <br>S/. {{$saldo_fin}} </h3>
    </table>

    <h3>Cuotas:</h3>
    <table class="tabla3">
    
    @foreach ($cuotas as $cuota)
    <tr>
        <td colspan="2">Cuota {{ $cuota['numero'] }}</td>
        <td>Fecha</td>
        <td>{{ $cuota['fecha_vencimiento'] }}</td>
        <td>Monto</td>
        <td>s/. {{ $cuota['monto'] }}</td>
    </tr>
    @endforeach
    </table>
</body>

</html>