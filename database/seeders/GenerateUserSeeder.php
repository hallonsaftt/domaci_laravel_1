<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class GenerateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = $this->command->getOutput()->ask('What is your email?');

        if($email === null) {
            $this->command->getOutput()->error("No email set");
        }

        $password = $this->command->getOutput()->ask('What is your password?');

        if($password === null) {
            $this->command->getOutput()->error("No password set");
        }


        $role = $this->command->getOutput()->ask('What is your role?');

        if($role === null) {
            $this->command->getOutput()->error("No role set");

        }


        User::create([
            'name' => $email,
            'email' => $email,
            'password' => HASH::make($password),
            'role' => $role,
        ]);

        $this->command->getOutput()->success("User created successfully");


    }


}
