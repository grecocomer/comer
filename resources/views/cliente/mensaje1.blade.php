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

<h1 align="center">{{$titulo}}</h1>
<br>
<br>
<br>
<h3 align="center">{{$mensaje1}}</h3>
@stop
