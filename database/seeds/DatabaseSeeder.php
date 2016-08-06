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
        $this->call(SalesTableSeeder::class);
    }
}

class SalesTableSeeder extends Seeder
{
    public function run()
    {
        \DB::table('sales')->truncate();
        factory(\Louis\Models\Sale::class, 1000)->create();
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


