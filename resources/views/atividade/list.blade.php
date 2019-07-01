@extends('layouts.app')
@section('content')
<h1>Lista de Atividades</h1>
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
<a href="/atividades/create">Criar nova atividade</a>
@endauth

@foreach($atividades as $atividade)
	<h3>{{\Carbon\Carbon::parse($atividade->scheduledto)->format('d/m/Y h:m') }}</h3>
	<p><a href="/atividades/{{$atividade->id}}">{{$atividade->title}}</a></p>
	<p>{{$atividade->description}}</p>
	@auth
    <a href="/atividades/{{$atividade->id}}/edit">Editar atividade {{$atividade->id}}</a>
    <br>
    <br>
    <a href="/atividades/{{$atividade->id}}/delete">Excluir atividade {{$atividade->id}}</a>
		<br> <br>
	@endauth
@endforeach
{{$atividades->links()}}
@endsection

<!-- \Carbon\Carbon::parse($a->scheduledto)->format('d/m/Y h:m')  -->