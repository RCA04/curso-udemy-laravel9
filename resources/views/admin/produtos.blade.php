@extends('admin.layout')
@section('titulo', 'Produtos')
@section('conteudo')

<div class="fixed-action-btn">
    <a  class="btn-floating btn-large bg-gradient-green modal-trigger" href="#create">
      <i class="large material-icons">add</i>
    </a>   
  </div>

@include('admin.produtos.create')

    <div class="row container crud">

        
            <div class="row titulo ">              
              <h1 class="left">Produtos</h1>
              <span class="right chip">{{ $produtos->count()}} produtos exibidos nessa pagina</span>  
            </div>

           <nav class="bg-gradient-blue">
            <div class="nav-wrapper">
              <form method="GET" action="{{ route('admin.produtos') }}">
                <div class="input-field">
                    <input placeholder="Pesquisar..." id="search" name="search" type="search" required>
                    <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                    <i class="material-icons" id="deletar">clear</i>
                </div>              
              </form>
            </div>
          </nav>     

            <div class="card z-depth-4 registros" >
            @include('admin.includes.mensagens')
            <table class="striped ">
                <thead>
                  <tr>
                    <th></th>
                    <th>ID</th>  
                    <th>Produto</th>
                      
                      <th>Preço</th>
                      <th>Categoria</th>
                      <th></th>
                  </tr>
                </thead>
        
                <tbody>
                  @foreach ($produtos as $produto )
                  @if ($produto->id_user == auth()->user()->id)
                      <tr>
                        <td><img src="{{ $produto->imagem ? asset('img/products/' . $produto->imagem) :  'https://img.icons8.com/pastel-glyph/128/box--v3.png'}}"  class="circle"></td>
                        <td>#{{$produto->id}}</td>
                        <td>{{$produto->nome}}</td>                    
                        <td>R$ {{ number_format($produto->preco, 2 , ',', '.')}}</td>
                        <td>{{$produto->categoria->name}}</td>
                        <td>
                          <a class="btn-floating  waves-effect waves-light orange">
                            <i class="material-icons">mode_edit</i>
                          </a>
                          
                        <a href="#delete-{{ $produto->id }}" class="btn-floating modal-trigger waves-effect waves-light red"><i class="material-icons">delete</i></a></td>
                            @include('admin.produtos.delete')
                    </tr>
                    @endif
                    @endforeach
                  </tr>
                </tbody>
              </table>
            </div> 

            <div class= "row center">
              {{ $produtos->appends(['search' => request('search')])->links('custom.pagination') }}
            </div>       
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function () {
    const clearIcon = document.getElementById('deletar');
    const searchInput = document.getElementById('search');

    clearIcon.addEventListener('click', function () {
      searchInput.value = ''; // limpa o campo
      window.location.href = "{{ route('admin.produtos') }}"; // redireciona sem query
    });
  });
      </script>
@endsection