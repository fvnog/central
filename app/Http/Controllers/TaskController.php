<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Exibe a lista de tarefas
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // Exibe o formulário para criar uma nova tarefa
    public function create()
    {
        return view('tasks.create');
    }

    // Armazena a nova tarefa
    public function store(Request $request)
    {
        // Valida os campos
        $request->validate([
            'title' => 'required|string|max:255',  // Valida que o título é necessário
            'description' => 'nullable|string',
            'is_completed' => 'boolean',  // Verifica se é um valor booleano
        ]);
    
        // Cria a tarefa no banco de dados
        Task::create([
            'title' => $request->input('title'),  // Garante que o título seja atribuído corretamente
            'description' => $request->input('description'),
            'is_completed' => $request->has('is_completed') ? 1 : 0, // Se o checkbox estiver marcado, é 1, senão 0
            'user_id' => auth()->id(), // Associa a tarefa ao usuário logado
        ]);
    
        // Redireciona com uma mensagem de sucesso
        return redirect()->route('tasks.index')->with('success', 'Tarefa criada com sucesso!');
    }
    

    // Exibe os detalhes de uma tarefa
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    // Exibe o formulário para editar uma tarefa
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Atualiza a tarefa
    public function update(Request $request, Task $task)
    {
        // Corrigindo a validação para usar 'title' em vez de 'name'
        $request->validate([
            'title' => 'required|string|max:255',  // Alterado de 'name' para 'title'
            'description' => 'nullable|string',
            'is_completed' => 'boolean',
        ]);

        // Atualizando a tarefa
        $task->update($request->all());

        return redirect()->route('tasks.index');
    }

public function complete(Task $task)
{
    // Marca a tarefa como completada
    $task->update(['is_completed' => true]);

    // Redireciona de volta para a lista de tarefas com uma mensagem de sucesso
    return redirect()->route('tasks.index')->with('success', 'Tarefa marcada como completada!');
}


    // Remove uma tarefa
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
