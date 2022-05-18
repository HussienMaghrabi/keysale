<?php

use App\ModulesConst\UserTyps;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {

        $item['user_type_id'] = UserTyps::admin;
        $item['api_token'] = "1";
        $item['name'] = "Admin";
        $item['email'] = "admin@admin.com";
        $item['password'] = bcrypt(123456);
        \App\User::create($item);


    }

}
