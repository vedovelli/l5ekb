<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Request;

use App\Http\Requests;

class UsersController extends Controller
{
    public function index()
    {
        $users = \Louis\Models\User::paginate(10);
        $addresses = [];
        return view('users.index')->with(compact('users', 'addresses'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store()
    {
        $input = Request::only('name', 'email', 'age', 'password');

        $user = new \Louis\Models\User();
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->age = $input['age'];
        $user->password = bcrypt($input['password']);
        $user->save();

        return redirect()->route('users.index');
    }
}
