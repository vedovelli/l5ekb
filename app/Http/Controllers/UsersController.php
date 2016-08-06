<?php

namespace App\Http\Controllers;

use Louis\Models\User;
use Request;

use App\Http\Requests;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        $addresses = [];
        return view('users.index')->with(compact('users', 'addresses'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(\Request $request)
    {

        $input = $request->only('name', 'email', 'age', 'password');
        dd($input);

        $user = new User();
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->age = $input['age'];
        $user->password = bcrypt($input['password']);
        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuário cadastrado com sucesso!');;
    }

    public function edit($id)
    {
        $user = User::find($id);

        if (is_null($user)) {
            return redirect()->route('users.index')->withErrors(['Usuário não localizado!']);
        }

        return view('users.edit')->with(compact('user'));
    }

    public function update($id)
    {
        $input = \Request::only('name', 'email', 'age', 'password');
        extract($input);

        $user = User::find($id);

        if (is_null($user)) {
            return redirect()->route('users.edit', $id)->withErrors(['Usuário não localizado!']);
        }

        $user->name = $name;
        $user->age = $age;
        $user->email = $email;

        if (!empty($password)) {
            $user->password = bcrypt($password);
        }

        $user->save();

        return redirect()->route('users.edit', $id)->with('success', 'Usuário atualizado com sucesso!');
    }

    public function delete($id)
    {
        dd($id);
    }
}
