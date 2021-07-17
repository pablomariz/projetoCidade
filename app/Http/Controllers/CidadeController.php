<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;
use App\Http\Requests\CidadeRequest;
class CidadeController extends Controller
{
    public function cidades()
    {
        $subtitulo  = 'Lista de cursos';


        $cidades = Cidade::all();

        // dd($cidades);
        // foreach ($cidades as $cidade){
        //     echo $cidade->nome;
        // }
        return view('admin.cidades.index', compact('subtitulo', 'cidades'));
    }
    public function formAdicionar()
    {
        return view('admin.cidades.form');
    }

    public function formSave(CidadeRequest $request) 
    {
        
            $cidade = new Cidade();
            $cidade->nome = $request->nome;
            $cidade->valor = $request->valor;
            $cidade->data = $request->data;

        
        $cidade->save();
        return redirect()->route('admin.cidades.listar');



    }
    public function deletar($id, Request $request){
        Cidade::destroy($id);
        $request->session()->flash('sucesso',"Curso deletado");
        return redirect()->route('admin.cidades.listar');
    }
}
