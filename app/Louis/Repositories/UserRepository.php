<?php

namespace Louis\Repositories;

use Louis\Models\User;
use Cache;

class UserRepository {

    public function user($id)
    {
        $user = User::with('sales')->find($id);
        return $user;
    }

    public function paginated($total = 10, $currentPage = 1)
    {
        $expiration = 60; // minutos
        $key = 'user_' . $currentPage;

        return Cache::remember($key, $expiration, function () use ($total) {
            return User::with('sales')->paginate($total);
        });
    }

    public function all()
    {
        $expiration = 60; // minutos
        $key = 'user';

        return Cache::remember($key, $expiration, function () {
            return User::all();
        });
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