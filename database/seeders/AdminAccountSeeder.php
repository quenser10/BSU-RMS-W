<?php

namespace Database\Seeders;

use App\Models\AdminAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminAccountSeeder extends Seeder
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
                'last_name'=>'Admin',

               'first_name'=>'Admin',

               'middle_name'=>'A.',

               'extension_name'=>'Sr.',

               'sex'=>'Male',

               'employee_id'=>'123453',

               'email'=>'h.rsp@gmail.com',

               'office_designation'=>'HRMO',

               'password'=> bcrypt('12345678'),

               'is_admin'=>'1',

               'approved'=>'1',


               'created_at'=>'2022-11-24 19:57:52',

               'updated_at'=>'2022-11-24 19:57:52',

            ],

        ];

  

        foreach ($user as $key => $value) {

            AdminAccount::create($value);

        }
    }
}
