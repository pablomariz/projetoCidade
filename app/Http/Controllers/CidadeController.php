<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;
use App\Http\Requests\CidadeRequest;
class CidadeController extends Controller
{
    public function cidades()
    {
        $subtitulo  = 'Lista de cidades';

        // $cidades = ['Pirapora', 'Buritizeiro'];

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

    public function formSave(CidadeRequest $request) ##eu quero que voce injete a dependencia no método
    {
        // //criar um objeto do modelo
        // $cidade = new cidade();
        // $cidade->nome = $request->nome;
        // $cidade->save();//salvar no bd
        //validate

        Cidade::create($request->all());##criando obj do modelo
        $request->session()->flash('sucesso',"Cidade $request->nome incluida!");
        return redirect()->route('admin.cidades.listar');
    }
    public function deletar($id, Request $request){
        Cidade::destroy($id);
        $request->session()->flash('sucesso',"cidade deletada");
        return redirect()->route('admin.cidades.listar');
    }
}
