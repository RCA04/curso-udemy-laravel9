@extends('admin.layout')

@section('title', 'perfil')

@section('conteudo')

  <div class="w-full h-full flex flex-col justify-center items-center  ">
  <div class="w-full max-w-md bg-slate-100 shadow-2xl/60 rounded-xl p-6 mt-[40px] ">
    <div class="flex flex-col items-center  bg-inherit rounded-2xl  text-wrap">
      <img
        src="{{ auth()->user()->photo ? asset('img/profiles/' . auth()->user()->photo) : 'https://img.icons8.com/fluency-systems-filled/48/user.png'}}"
        class="w-50 h-50 rounded-full border-4 mt-[10px] mb-[17px] shadow-2xl/100"
      />
      <p class="mt-4 text-xl font-semibold text-center mb-[3px]">{{Str::limit(auth()->user()->name, 35)}}</p>
      @if(auth()->user()->updated_at == auth()->user()->created_at)
      <p class="text-slate-500 text-sm">Nenhuma alteração desde a criação</p>      
      @else
      <p class="text-slate-500 text-sm font-bold">Ultima alteração: {{auth()->user()->updated_at->format('d/m/Y')}}</p>
      
      @endif
    </div>

    <div class="mt-6 space-y-4 text-sm">
      <div class="flex justify-between items-center">
        <span class="text-gray-800 font-bold self-start">Nome</span>
        <div class="flex items-center gap-2">
          <p class="text-gray-600  pl-[2.5px]">{{Str::limit(auth()->user()->name, 35)}}</p>
        </div>
      </div>
      <div class="flex justify-between items-center">
        <span class="text-gray-800 font-bold self-start">Email</span>
        <div class="flex items-center gap-2">
          <span class="text-gray-600 pl-[2.5px]">{{auth()->user()->email}}</span>
        </div>
      </div>
      <div class="flex justify-between items-center">
        <span class="text-gray-800 font-bold">Data de criação</span>
        <div class="flex items-center gap-2">
          <span class="text-gray-600">{{auth()->user()->created_at->format('d/m/Y')}}</span>
        </div>
      </div>
      <div class="flex justify-center">
        <button class="btn w-full bg-amber-600">
       <a  href="{{ route('profile.edit') }}" class="inline-flex items-center c-white gap-2" style="color:white">
        <span>Editar perfil</span>
        <i class="material-icons icon-text-style">create</i>
      </a>

        </button>
      </div>
      </div>
  </div>












      
@endsection