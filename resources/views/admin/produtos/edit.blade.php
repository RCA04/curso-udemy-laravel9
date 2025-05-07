   <!-- Modal Structure -->
   <div id="create" class="modal">
    <div class="modal-content">
      <h4><i class="material-icons">playlist_add_circle</i> Novo produto</h4>
      <form action="{{route('admin.produto.store')  }}" method="POST" enctype="multipart/form-data"  class="col s12" >
        @csrf

        <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">

        <div class="row">
          <div class="input-field col s6">
            <input name="nome" id="nome" type="text" class="validate">
            <label for="nome">Nome</label>
          </div>
          <div class="input-field col s6">
            <input name="preco" id="preco" type="number" class="validate">
            <label for="preco">Preço</label>
          </div>

          <div class="input-field col s12">
            <input name="descrição" id="descrição" type="text" class="validate">
            <label for="descrição">Descrição</label>
          </div>

          <div class="input-field col s12">
            <select name="id_categoria">
              <option value="" disabled selected>Escolha uma opção</option>
              @foreach ($categorias as $c )
              <option value="{{ $c->id }}">{{$c->name}}</option>
              @endforeach
            </select>
            <label>Categoria</label>
          </div>     
          

          <div class="inline-flex items-center">
            <div class="btn">
              <label for="file">
                <span class="text-white">  
                Adicionar Imagem
                </span>
              </label>
            </div>
            <div class="file-path-wrapper pl-[5px] border-r-2 border-b-2 border-t-2 rounded-r-xl border-slate-100 border-b-slate-300 block h-[36px]">
              <input type="file" id="file" name="imagem" accept=".png, .jpeg, .jpg"
               value="imagem">
            </div>
          </div>

        </div> 
       <div>
        <button type="submit" class=" waves-effect waves-green btn green right">Cadastrar</button><br>
       </div> 
      </form>
      </div>

</div>