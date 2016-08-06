<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewUserFormRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'age' => 'required',
            'password' => 'required|min:6|same:password_confirmation'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'email.required' => 'O campo nome é obrigatório',
            'email.email' => 'Verifique a estrutura do e-mail informado',
            'age.required' => 'O campo nome é obrigatório',
            'password.required' => 'A senha é obrigatória',
            'password.min' => 'A senha deve ter no minimo 6 caracteres',
            'password.same' => 'Senha e confirmação devem ser iguais',
        ];
    }
}
