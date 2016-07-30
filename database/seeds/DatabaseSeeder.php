<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder // php artisan db:seed
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
    }
}

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        \DB::table('users')->truncate();

        $u = \Louis\Models\User::create([
            'name' => 'Ved',
            'email' => 'vedovelli@gmail.com',
            'age' => '42',
            'password' => bcrypt(123456),
        ]);
        factory(\Louis\Models\User::class, 100)->create();
    }
}


