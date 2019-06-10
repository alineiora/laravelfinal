<h1>Lista de Mensagens</h1>
<hr>
@if ($errors->any())
	<div class="container">
	  <div class="alert alert-danger">
	    <ul>
	      @foreach ($errors->all() as $error)
	      <li>{{ $error }}</li>
	      @endforeach
	    </ul>
	  </div>
	</div>
  @endif
  
@if (Session::has('sucess'))
    <div class="container">
        <div class="alert alert-sucess">
            {{\Session::get('sucess')}}
        </div>
    </div>
@endif

@auth
<a href="/mensagem/create">Criar nova mensagem</a>
@endauth

@foreach($mensagem as $m)
	<h3>{{\Carbon\Carbon::parse($m->created_at)->format('d/m/Y h:m') }}</h3>
	<p><a href="/mensagem/{{$m->id}}">{{$m->titulo}}</a></p>
	<p>{{$m->texto}}</p>
    <p>{{$m->autor}}</p>
		@auth
    <a href="/mensagem/{{$m->id}}/edit">Editar mensagem {{$m->id}}</a>
    <br>
    <br>
    <a href="/mensagem/{{$m->id}}/delete">Excluir mensagem {{$m->id}}</a>
		<br><br>
		@endauth
@endforeach