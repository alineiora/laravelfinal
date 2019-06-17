<?php

namespace App\Http\Controllers;

use App\Atividade;
use App\Mensagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class mensagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listamensagem = Mensagem::all();
        return view('mensagem.list',['mensagem' => $listamensagem]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listaAtividades = Atividade::all();
        return view ('mensagem.create',['atividades' => $listaAtividades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        {
            //faço as validações dos campos
            //vetor com as mensagens de erro
            $messages = array(
                'titulo.required' => 'É obrigatório um título para a mensagem',
                'texto.required' => 'É obrigatória uma descrição para a mensagem',
                'autor.required' => 'É obrigatório o cadastro do autor da mensagem',
            );
            //vetor com as especificações de validações
            $regras = array(
                'titulo' => 'required|string|max:255',
                'texto' => 'required',
                'autor' => 'required',
            );
            //cria o objeto com as regras de validação
            $validador = Validator::make($request->all(), $regras, $messages);
            //executa as validações
            if ($validador->fails()) {
                return redirect('mensagem/create')
                ->withErrors($validador)
                ->withInput($request->all);
            }
            //se passou pelas validações, processa e salva no banco...
            $obj_Mensagem = new Mensagem();
            $obj_Mensagem->titulo = $request['titulo'];
            $obj_Mensagem->texto = $request['texto'];
            $obj_Mensagem->autor = $request['autor'];
            $obj_Mensagem->user_id = Auth::id();
            $obj_Mensagem->atividade_id = $request['atividade_id'];
            $obj_Mensagem->save();
            return redirect('/mensagem')->with('sucess', 'Mensagem criada com sucesso!!');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mensagem = Mensagem::find($id);
        return view('mensagem.show',['mensagem' => $mensagem]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj_Mensagem = Mensagem::find($id);
        return view('mensagem.edit',['mensagem'=> $obj_Mensagem]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //faço as validações dos campos
            //vetor com as mensagens de erro
            $messages = array(
                'titulo.required' => 'É obrigatório um título para a mensagem',
                'texto.required' => 'É obrigatória uma descrição para a mensagem',
                'autor.required' => 'É obrigatório o cadastro do autor da mensagem',
            );
            //vetor com as especificações de validações
            $regras = array(
                'titulo' => 'required|string|max:255',
                'texto' => 'required',
                'autor' => 'required',
            );
            //cria o objeto com as regras de validação
            $validador = Validator::make($request->all(), $regras, $messages);
            //executa as validações
            if ($validador->fails()) {
                return redirect("mensagem/$id/edit")
                ->withErrors($validador)
                ->withInput($request->all);
            }
            //se passou pelas validações, processa e salva no banco...
            $obj_Mensagem = Mensagem::findOrFail($id);
            $obj_Mensagem->titulo = $request['titulo'];
            $obj_Mensagem->texto = $request['texto'];
            $obj_Mensagem->autor = $request['autor'];
            $obj_Mensagem->save();
            return redirect('/mensagem')->with('sucess', 'Mensagem alterada com sucesso!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $obj_Mensagem = Mensagem::find($id);
        return view('mensagem.delete',['mensagem' => $obj_Mensagem]);
    }

    public function destroy($id)
    {
        $obj_Mensagem = Mensagem::findOrFail($id);
        $obj_Mensagem->delete($id);
        return redirect('/mensagem')->with('sucess',"Mensagem excluída com sucesso!!");
    }
}
