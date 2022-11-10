<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;

        $user->name = 'javi';
        $user->email = 'javi.romero2613@gmail.com';
        $user->password = bcrypt('12345678');
        $user->save();

        User::factory(50)->create();
    }
}
