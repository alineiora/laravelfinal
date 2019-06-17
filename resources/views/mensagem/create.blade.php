<h1>Formulário de Cadastro de Mensagem </h1>
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

<form action="/mensagem" method="post">
    {{csrf_field()}}

    Título: <input type="text" name="titulo"> <br>
    Texto: <input type="text" name="texto"> <br>
    Autor: <input type="text" name="autor"> <br>
    Atividade: <select name = "atividade_id">
      @foreach ($atividades as $atividade)
        <option value="{{$atividade->id}}">{{$atividade->title}}</option>
      @endforeach
  </select> <br>
    <input type="submit" value="Salvar">
</form>