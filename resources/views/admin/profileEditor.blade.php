@extends('admin.layout')

@section('title', 'perfil')

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


  <div class="w-full flex flex-col justify-center items-center ">
    <div class="w-full max-w-md bg-slate-100 shadow-2xl/60 rounded-xl p-6 mt-[40px] ">
      <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    
        <div class="flex flex-col items-center bg-inherit rounded-2xl  text-wrap"> 

          
          <img src="{{ auth()->user()->photo ? asset('img/profiles/' . auth()->user()->photo) : 'https://img.icons8.com/fluency-systems-filled/48/user.png'}}"
          alt=""  class="z-0 w-50 h-50 rounded-full border-4 mt-[10px] mb-[17px] shadow-2xl/100" />
          
          <label for="file" class="absolute rounded-full cursor-pointer bg-sky-300" >
          <i class="material-icons text-black">create</i>
          </label>
          <input type=file id="file" name="photo" accept=".png, .jpeg, .jpg"
           class="hidden" value="{{ asset('img/profiles'. auth()->user()->photo) }}">
        
        
        </div>
          

            
       
          <div>
          <p title="{{auth()->user()->name}}" class="mt-4 text-xl font-semibold text-center mb-[3px]">{{Str::limit(auth()->user()->name, 35)}}</p>
        </div>

      <div class="mt-6 space-y-4 text-sm">
        <div class="flex justify-between items-center">
        <span class="text-gray-800 font-bold">Nome</span>
        <div class="flex items-center gap-2">
        <input type="text"  value="{{ auth()->user()->name }}" name="name" placeholder="{{ auth()->user()->name }}">
        </div>
      </div>
      <div class="flex justify-between items-center">
        <span class="text-gray-800 font-bold">Email</span>
        <div class="flex items-center gap-2">
          <input type="text" name="email"  value="{{auth()->user()->email}}" placeholder="{{auth()->user()->email}}">
        </div>
      </div>
      <div class="mt-5">
        <button class="btn w-full" style=background-color:#F44336>
          Salvar</button>
      </div>
      </form>
    </div>
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
      }, 1800);
    });
</script>


@endsection