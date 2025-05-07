<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>   
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Custom CSS-->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!--TailWind-->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    
</head>
<body>
    @yield('conteudo')
</body>
</html>