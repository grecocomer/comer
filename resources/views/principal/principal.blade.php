
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Principal</title>
   
    <style>
      *{
         padding:0px;
         margin:0px;
       }

       #header{
           margin:;
           width:;
           font-family:Arial, Helvetica, sans-serif;
       }

       ul, ol{
           list-style:none;
       }
       
       .nav li a{
           background-color:#000;
           color:#fff;
           text-decoration:none;
           padding: 10px 12px;
           display:block;
       }
    
       .nav li a:hover{
           background-color:#434343;
                  }
       .nav> li{
           float:left;
       }
       .nav li ul{
           display:none;
           position:absolute;
           min-width:140px;
       }
       .nav li:hover > ul{
           display:block;
       }

        .nav li ul li{
            position:relative;
        }
        .nav li ul li ul{
            right:-140px;
            top:0px;
        }

        .bo {
            background-color:blue;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body id="bo">
    <div id="header">
      <ul class="nav">
        <li><a href="{{url('/vistaprincipal/')}}">Inicio</a></li>

        <li><a href="">Formularios</a>
          <ul> 

              <li><a href="">Empleado</a>
               <ul>
                <li><a href="{{url('/altaempleados/')}}">Alta</a></li>
                <li><a href="{{url('/reporteempleado/')}}">Consultas</a></li>
               </ul>
             </li> 

             <li><a href="">Cliente</a>
               <ul>
                <li><a href="{{ url('/altacliente/') }}">Alta</a></li>
                <li><a href="{{url('/reporteclientes/')}}">Consultas</a></li>
               </ul>
             </li>  

              <li><a href="">Proveedor</a>
               <ul>
                <li><a href="{{url('/altaproveedor/')}}">Alta</a></li>
                <li><a href="{{url('/reporteproveedor/')}}">Consultas</a></li>
               </ul>
             </li> 

              <li><a href="">Producto</a>
               <ul>
                <li><a href="">Alta</a></li>
                <li><a href="">Consultas</a></li>
               </ul>
             </li>       

              <li><a href="">Servicio</a>
               <ul>
                <li><a href="">Alta</a></li>
                <li><a href="">Consultas</a></li>
               </ul>
             </li>   

        </li>
      </ul>
      <br>
      <br>
      <div id="body">@yield("body")</div>
    </div>
</body>
</html>