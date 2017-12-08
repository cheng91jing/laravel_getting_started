<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();   //关闭批量赋值保护

        $this->call(UsersTableSeeder::class);

        Model::reguard();   //开启批量赋值保护
    }
}
