<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'role_id' => 1,
                'name'    => "Aulia Agustina",
                'username'    => "auliaguss",
                'email'    => "emailaulia@gmail.com",
                'password'    => bcrypt('auliaguss098'),
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'role_id' => 2,
                'name'    => "Harry Styles",
                'username'    => "hstyles",
                'email'    => "hstyles@gmail.com",
                'password'    => bcrypt('hstyles098'),
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'role_id' => 2,
                'name'    => "Niall Horan",
                'username'    => "nhoran",
                'email'    => "nhoran@gmail.com",
                'password'    => bcrypt('nhoran098'),
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'role_id' => 2,
                'name'    => "Zac Efron",
                'username'    => "z.efron",
                'email'    => "z.efron@gmail.com",
                'password'    => bcrypt('z.efrom098'),
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'role_id' => 2,
                'name'    => "Zendaya",
                'username'    => "zdaya",
                'email'    => "zdaya@gmail.com",
                'password'    => bcrypt('zdaya098'),
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'role_id' => 1,
                'name'    => "Supriyadi",
                'username'    => "supri",
                'email'    => "supri@gmail.com",
                'password'    => bcrypt('supri098'),
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'role_id' => 2,
                'name'    => "Benedict Cumber",
                'username'    => "bened",
                'email'    => "bened@gmail.com",
                'password'    => bcrypt('bened098'),
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'role_id' => 2,
                'name'    => "Dan Thomas",
                'username'    => "d.thom",
                'email'    => "d.thom@gmail.com",
                'password'    => bcrypt('d.thom098'),
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'role_id' => 2,
                'name'    => "Brodie",
                'username'    => "brood",
                'email'    => "brood@gmail.com",
                'password'    => bcrypt('brood098'),
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'role_id' => 1,
                'name'    => "Santoso",
                'username'    => "santo",
                'email'    => "santo@gmail.com",
                'password'    => bcrypt('santo098'),
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
        ]);
    }
}
