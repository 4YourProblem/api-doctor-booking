<?php

namespace Database\Seeders;

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
        $name = [
            "admin",
        ];
        $email = [
            "admin@gmail.com",
        ];
        $password = [bcrypt('admin123')];
        $phone = [
            "1234567891",
        ];
        $role = ['ROLE_ADMIN'];
        for ($i = 0; $i < count($name); $i++) {
            \DB::table('users')->insert([
                'id' => $i + 1,
                'name' => $name[$i],
                'email' => $email[$i],
                'password' => $password[$i],
                'phone' => $phone[$i],
                'role' => $role[$i],
            ]);
        }
    }
}
