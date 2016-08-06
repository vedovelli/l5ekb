<?php

namespace Louis\Repositories;
use Louis\Models\User;

class UserRepository {

    public function user($id)
    {
        return User::find($id);
    }

    public function paginated($total = 10)
    {
        return User::paginate($total);
    }

    public function all()
    {
        return User::all();
    }

    public function store($input)
    {
        $user = new User($input);
        $user->password = bcrypt($input['password']);
        $user->save();
        return $user;
    }

    public function update($id, $input)
    {
        extract($input);

        $user = User::find($id);

        if (is_null($user)) {
            return false;
        }

        $user->name = $name;
        $user->age = $age;
        $user->email = $email;

        if (!empty($password)) {
            $user->password = bcrypt($password);
        }

        return $user->save();
    }

    public function delete($id)
    {
        $user = User::find($id);

        if (is_null($user)) {
            return false;
        }
        return $user->delete();
    }
}