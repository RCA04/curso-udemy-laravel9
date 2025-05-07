@extends('admin.layout')
@section('title', "Tadeu store")
@section('conteudo')

<div class="row container">
  @foreach ( $produtos as $produto )
    <div class="col s10 m4">
        <div class="card">
            <div class="card-image">
              <img src="{{ $produto->imagem ? asset('img/products/' . $produto->imagem) :  'https://img.icons8.com/pastel-glyph/128/box--v3.png'}}" class="h-100">
              @can('verProduto', $produto)
              <a href="{{ route('site.details', $produto->slug) }}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">visibility</i></a>
              @endcan
            </div>
            <div class="card-content">
              <span class="card-title truncate">{{$produto->nome}}</span>
            </div>
          </div>
    </div>  
  @endforeach
</div>
<div class= "row center">
{{ $produtos->links('custom.pagination') }}
</div>
@endsection