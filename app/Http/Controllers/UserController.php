<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{


    public function destroy(User $user)
{
    $user->delete();
    return redirect()->route('users.index')->with('success', 'Usuário removido com sucesso!');
}


}
