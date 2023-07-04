<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;

class TarefasController extends Controller
{
    public function index() 
    {
        $tarefas = Tarefa::all(); //busca tarefas no banco de dados

        
        return response()->json($tarefas); //retorna resultados
    }

    public function show($id)
    {
        $tarefa = Tarefa::find($id); //procura uma tarefa específica com base em seu id

        if (!$tarefa) {
            return response()->json(['message' => 'tarefa não foi criada'], 404); //se a tarefa não for encontrada esta mensagem será retornada
        }
        return response()->json($tarefa); //se a tarefa for encontrada retornara essa mensagem em json
    }

    public function store(Request $request)
    {
        $request->validate([  //valida os dados
            'titulo' => 'required',
            'descricao' => 'required',
            'status' => 'required',
        ]);
        $tarefa = Tarefa::create([   //cria uma tarefa com parametros obrigatórios
            'titulo' => $request->input('titulo'),
            'descricao' => $request->input('descricao'),
            'status' => $request->input('status'),
        ]);
        return response()->json($tarefa, 201); //mostra a tarefa criada em json
    }

    public function update(Request $request, string $id)
    {
        $tarefa = Tarefa::find($id); //procura a tarefa pelo id usado

        if (!$tarefa) {
            return response()->json(['message' => 'Tarefa não encontrada'], 404); //se a tarefa não for encontrada esta mensagem será retornada
        }

        $request->validate([  //se ela for encontrada a edição da tarefa será feita
            'titulo' => 'required',
            'descricao' => 'required',
            'status' => 'required',
        ]);

       
        $tarefa->titulo = $request->input('titulo');
        $tarefa->descricao = $request->input('descricao');
        $tarefa->status = $request->input('status');
        $tarefa->save();

        return response()->json($tarefa); //retorna a tarefa atualizada em json
    }

    public function destroy($id)
    {

        $tarefa = Tarefa::find($id); ////procura a tarefa pelo id usado

        if (!$tarefa) { 

            return response()->json(['message' => 'Tarefa não encontrada'], 404); //se a tarefa não for encontrada esta mensagem será retornada
        }

        $tarefa->delete(); //exclui a tarefa do banco de dados

        return response()->json(null, 204); //se a tarefa não for encontrada esta mensagem será retornada
    }
}