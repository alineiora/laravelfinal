<h1>Formulário de Edição de Mensagem </h1>
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

<form action="/mensagem/{{$mensagem->id}}" method="post">
    {{csrf_field()}}
    {{method_field('PUT')}}
    Título: <input type="text" name="titulo" value="{{$mensagem->titulo}}"> <br>
    Texto: <input type="text" name="texto" value="{{$mensagem->texto}}"> <br>
    Autor: <input type="text" name="autor" value="{{$mensagem->autor}}"> <br>

    <input type="submit" value="Salvar">
</form>