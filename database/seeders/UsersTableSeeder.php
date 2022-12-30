<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [

            [

               'name'=>'quenser',

               'email'=>'q@gmail.com',

               'password'=> bcrypt('12345678'),

            ],


        ];

  

        foreach ($user as $key => $value) {

            User::create($value);

        }
    }
}
