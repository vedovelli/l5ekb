<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewUserFormRequest;
use Louis\Repositories\UserRepository;
use Louis\Services\MailService;

use App\Http\Requests;

class UsersController extends Controller
{
    protected $userRepository;
    protected $mailService;

    public function __construct(UserRepository $userRepository, MailService $mailService)
    {
        $this->userRepository = $userRepository;
        $this->mailService = $mailService;
    }

    public function index()
    {
        $currentPage = \Request::get('page');
        $users = $this->userRepository->paginated(10, $currentPage);
        $addresses = [];
        return view('users.index')->with(compact('users', 'addresses'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(NewUserFormRequest $request)
    {
        $input = $request->only('name', 'email', 'age', 'password');

        $user = $this->userRepository->store($input);

        if (!is_null($user)) {
            $this->mailService->userRegistered($user);
            return redirect()->route('users.index')->with('success', 'Usuário cadastrado com sucesso!');;
        }
        return redirect()->route('users.new')->withErrors(['Falha ao salvar usuario!']);
    }

    public function edit($id)
    {
        $user = $this->userRepository->user($id);

        if (is_null($user)) {
            return redirect()->route('users.index')->withErrors(['Usuário não localizado!']);
        }
        return \Response::json($user);
        return view('users.edit')->with(compact('user'));
    }

    public function update($id)
    {
        $input = \Request::only('name', 'email', 'age', 'password');

        $result = $this->userRepository->update($id, $input);

        if (!$result) {
            return redirect()->route('users.edit', $id)->withErrors(['Falha ao atualizar usuario!']);
        }
        return redirect()->route('users.edit', $id)->with('success', 'Usuário atualizado com sucesso!');
    }

    public function delete($id)
    {
        $result = $this->userRepository->delete($id);

        if (!$result) {
            return redirect()->route('users.index')->withErrors(['Falha ao excluir usuario!']);
        }
        return redirect()->route('users.index')->with('success', 'Usuário removido com sucesso!');
    }
}
