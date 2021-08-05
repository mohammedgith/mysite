<?php

use Illuminate\Database\Seeder;
use App\User; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->where('email','mohammed@gmail.com')->first();
        if(!$user){
    User::create([
        'name' => 'mohammed',
        'email' => 'mohammed@gmail.com',
        'password' => Hash::make('12345678'),
        'role' => 'admin'
               ]);

        }
    }
}
