<?php

namespace App\Jobs;

use App\Mail\CompletedTasksMail;
use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Middleware\ThrottlesExceptions;

class SendCompletedTasksEmail extends Job implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function handle()
    {
        // Buscando as tarefas completadas de hoje
        $tasks = Task::where('is_completed', true)
                     ->whereDate('updated_at', today())
                     ->get();

        // Enviar o e-mail
        if ($tasks->count() > 0) {
            Mail::to('fernandovnc1@gmail.com') // Substitua pelo e-mail desejado
                ->send(new CompletedTasksMail($tasks));
        }
    }
}
