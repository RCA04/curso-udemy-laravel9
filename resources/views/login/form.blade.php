@if($mensagem = Session::get('error'))
{{ $mensagem }}
@endif

@if($errors->any())
    @foreach($errors->all() as $error )
    {{ $error }} <br>
    @endforeach
@endif

<form action="{{route('login.auth')}}" method="POST">
@csrf

Email:<br><input type="email" name="email"><br>
Senha <br><input type="password" name="password"> <br>
<input type="checkbox" name="remember"> lembrar-me
<button type="submit">Entrar  </button>


</form>