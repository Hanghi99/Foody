<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $data = [
            [
                "name"=>"Nhi",
                "email"=>"nhi@gmail.com",
                "address"=>"Gio Linh",
                "birthday"=>"1999/05/08",
                "password"=>bcrypt("123@abc"),
                "gender"=>"fimale",
            ],
            [
                "name"=>"Huyền",
                "email"=>"huyen@gmail.com",
                "address"=>"Đông Hà",
                "birthday"=>"1999/12/29",
                "password"=>bcrypt("456@abc"),
                "gender"=>"fimale",
            ]    


        ];
        DB::table('users')->insert($data);
    }
}
