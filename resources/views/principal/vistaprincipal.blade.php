<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Comercializadora Greco</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <link rel="stylesheet" type="text/css" href="css/Navegacion.css">
        <link rel="stylesheet" type="text/css" href="css/fontello.css">
        <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
        <!--<title>@yield('principal')</title>-->
    </head>
        <body>
            <header>
                <input type="checkbox" id="btn-menu">
                <label for="btn-menu" class="icon-down-open"></label>
                <nav class="Menu">
                    
                    <ul>
                        <li><a href="{{ url('/vistaprincipal/') }}">Inicio</a>

                        <li><a href="#">Clientes<span class="icon-down-open"></span></a>
                        <ul>
                        <li><a href="{{ url('/altacliente/') }}">Alta clientes</a></li>
                        <li><a href="{{ url('/reporteclientes/') }}">Consulta clientes</a></li>
                    </ul>
                    
                    <li><a href="#">Empleados<span class="icon-down-open"></span></a>
                    <ul>
<<<<<<< HEAD
                        <li><a href="{{ url('/altaempleados/') }}">Alta empleados</a></li>
                        <li><a href="{{ url('/reporteempleado/') }}">Consulta empleados</a></li>
=======
                        <li><a href="#">Alta empleados</a></li>
                        <li><a href="#">Consulta empleados</a></li>
>>>>>>> 4e2c4b0db6c6a3fa1e7d686fcd46547ebb4f0c15
                    </ul>

                    <li><a href="#">Productos<span class="icon-down-open"></span></a>
                    <ul>
<<<<<<< HEAD
                        <li><a href="{{ url('/altaproducto/') }}">Alta productos</a></li>
                        <li><a href="{{ url('/reporteproducto/') }}">Consulta productos</a></li>
=======
                        <li><a href="#">Alta productos</a></li>
                        <li><a href="#">Consulta productos</a></li>
>>>>>>> 4e2c4b0db6c6a3fa1e7d686fcd46547ebb4f0c15
                    </ul>

                    <li><a href="#">Proveedores<span class="icon-down-open"></span></a>
                    <ul>
<<<<<<< HEAD
                        <li><a href="{{ url('/altaproveedor/') }}">Alta proveedores</a></li>
                        <li><a href="{{ url('/reporteproveedor/') }}">Consulta proveedores</a></li>
=======
                        <li><a href="#">Alta proveedores</a></li>
                        <li><a href="#">Consulta proveedores</a></li>
                    </ul>

                    <li><a href="#">Empresas<span class="icon-down-open"></span></a>
                    <ul>
                        <li><a href="#">Alta empresas</a></li>
                        <li><a href="#">Consulta empresas</a></li>
>>>>>>> 4e2c4b0db6c6a3fa1e7d686fcd46547ebb4f0c15
                    </ul>

                    <li><a href="#">Servicios<span class="icon-down-open"></span></a>
                    <ul>
<<<<<<< HEAD
                        <li><a href="{{ url('/altaservicio/') }}">Alta servicios</a></li>
                        <li><a href="{{ url('/reporteservicio/') }}">Consulta servicios</a></li>
=======
                        <li><a href="#">Alta servicios</a></li>
                        <li><a href="#">Consulta servicios</a></li>
>>>>>>> 4e2c4b0db6c6a3fa1e7d686fcd46547ebb4f0c15
                    </ul>
                </nav>
            </header> 
            <br>
                <H1 align="center">Sistema de Comercializadora Greco</H1>
            <br>
            <!--<table border=5>
                <tr>
                    <td>Hola Mundo</td>
                    <td>Hola Mundo</td>
                    <td>Hola Mundo</td>
                </tr>
               <tr>
                    <td>Hola Mundo</td>
                    <td>Hola Mundo</td>
                    <td>Hola Mundo</td>
                </tr>
            </table>-->
            <div class='contenido'> 
            @yield('contenido')
            </div>
                  
            <!--<script src="Menu.js"></script>-->
            <div>
           
            </div>
           
</body>
</html>