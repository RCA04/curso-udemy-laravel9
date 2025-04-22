@if ($messagem = Session::get('sucesso'))
<div class="card-panel green">
  {{$messagem }}
</div>
@endif