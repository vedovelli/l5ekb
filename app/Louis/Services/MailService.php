<?php

namespace Louis\Services;

class MailService {
    public function userRegistered($user)
    {
        \Mail::send('users.emails.welcome', ['user' => $user], function ($m) use ($user) {
            $m->from(env('MAIL_FROM'), env('MAIL_NAME'));
            $m->to($user->email, $user->name)->subject('Welcome to Louis!');
        });
    }
}