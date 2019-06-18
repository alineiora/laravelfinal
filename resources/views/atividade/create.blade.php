@extends('layouts.app')
@section('content')
<h1>Formulário de Cadastro de Atividade </h1>
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

<form action="/atividades" method="post">
    {{csrf_field()}}

    Título: <input type="text" name="title"> <br>
    Descrição: <input type="text" name="description"> <br>
    Agendado para: <input type="datetime-local" name="scheduledto"> <br>

    <input type="submit" value="Salvar">
</form>
@endsection