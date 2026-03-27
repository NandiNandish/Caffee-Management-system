<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder; 

class UserSeeder extends Seeder
{
    private $userdata = [
        ["id"=> 1, "name" => "Test User", "usertype" => "0", "email" => "testuser@gmail.com", "password" => "test123"],
       ["id"=> 2, "name" => "Admin", "usertype" => "1", "email" => "admin@gmail.com", "password" => "password"],
       ["id"=> 3, "name" => "Test user 2", "usertype" => "0", "email" => "testuser2@gmail.com", "password" => "test1234"],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::whereNotNull('id')->delete();
        foreach ($this->userdata as $data) {
            User::create([
                'id' => $data["id"],
                'name' => $data["name"],
                'usertype' => $data["usertype"],
                'email' => $data["email"],
                'password' => bcrypt($data["password"]),
            ]);
        }
    }
}
