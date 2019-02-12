<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        App\User::create([
          'name'     => 'Administrador',
          'email'    => 'admin@admin.com',
          'user'     => 'admin',
          'password' => bcrypt("admin"),
        ]);

    }
}
