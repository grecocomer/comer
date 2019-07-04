@extends('index')

@section("contenido")
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <link rel="stylesheet" type="text/css" href="css/Navegacion.css">
        <link rel="stylesheet" type="text/css" href="css/fontello.css">
        <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="main.js"></script>
</head>

    <br>
    <div align="center">
        <H2>DATOS GUARDADOS EXITOSAMENTE</H2>
        <a href="{{route('home')}}"><button type="button" class="btn btn-success">Success</button></a>
        
    </div>
    <br>
@stop
