<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function store(Request $request){

        try {
            $reply = $request->all();

            $reply['user_id'] = 1;

            $thread = Thread::find($request['thread_id']);

            $thread->replies()->create($reply);

            flash('Resposta criada com sucesso')->success();

            return redirect()->back();

        } catch (\Exception $e) {

            $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar sua requisição!';

            flash($message)->warning();

            return redirect()->back();

        }


    }
}
