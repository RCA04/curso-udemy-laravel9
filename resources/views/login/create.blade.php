@extends('site.layout')

@section('title', 'Registrar-se')

@section('conteudo')

<style>
    @keyframes fadeOut {
        0% {
            opacity: 1;
            transform: translateY(0);
        }
        100% {
            opacity: 0;
            transform: translateY(-20px);
        }
    }
    .fade-out {
        animation: fadeOut 1.5s ease-out forwards;
    }
</style>


@if($errors->any())
<div id="error-card" class="card red content-center" style="height:80px;">
    <div card="card-content">
        <div class="card-title white-text">
            <ul class="font-bold uppercase center-align">    
            @foreach($errors->all() as $error )
               <li class="text-shadow-lg"> {{ $error }} </li>
                @endforeach
            </ul>
            </div>
        </div>
    </div>
@endif

<div class="container" style="width:100%;height:100%">
    <div class="row mt-[50px]  shadow-2xl/100" style="width:399px; height: 399px;">
        <div class="card border-1 border-slate-200 shadow-2xl" >
            <div class="card-title center w-full bg-[#f44336] h-15 inline-flex justify-center" > 
            <span class="content-center text-neutral-100 font-medium" >
                Registrar
             </span>
            </div>
            <div class="card-content">
            <form action="{{route('users.store')}}" method="POST">
                @csrf
                <div class="input-field">
                    <span class="font-medium">Nome Completo:</span>
                    <br><input type="text" name="name"><br>
                </div>
                <div>
                    <span class="font-medium">Email:</span>
                    <br><input type="email" name="email"><br>
                </div>
                <div class="input-field">
                    <span class="font-medium">Senha:<span>
                    <br><input type="password" name="password"> <br>
                </div>

                    <div class="center-align mt-5 mb-5 block">
                    <button type="submit" class="btn waves-effect red">Cadastrar
                    <i class="material-icons right">send</i>
                </button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
        var card = document.getElementById('error-card');
        if(card) {
            card.classList.add('fade-out');
            setTimeout(function(){
                card.style.display = 'none'
          },500);
        }
      }, 3500);
    });
</script>


@endsection