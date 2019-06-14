<!DOCTYPE html>
<html lang="en">

<head>
    <title> LOGIN</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>

<!--<body align='center'>-->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
            <form action="{{route('validalogin')}}" method="POST">
                {{ csrf_field() }}

                @if($errors->first('user'))
                <i> {{ $errors->first('user') }} </i>
                @endif <br>

                Tecla usuario<input type="text" name="user" class="form-control">
                <br>
                <br>
                @if($errors->first('pasw'))
                <i> {{ $errors->first('pasw') }} </i>
                @endif <br>
                teclea password <input type="text" name="pasw" class="form-control">
                <br>
                <input type="submit" value="Iniciar sesion" class="form-control">
            </form>

            @if(Session::has('error'))
            <div>{{Session::get('error')}}</div>
            <script>
                alert("{{Session::get('error')}}");
            </script>
            @endif

        </div>
    </div>

</div>

</div>
</div>
</div>
</div>
<!-- End PAge Content -->
</div>

</body>

</html>
