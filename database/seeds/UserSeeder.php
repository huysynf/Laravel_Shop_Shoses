<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name'=>'Hạ Huy ',
            'email'=>'admin@admin.com',
            'password'=>'123456', // 123456,
            'image'=>'default.jpg',
            'phone'=>'0337172888',
            'gender'=>'1',
            'address'=>'Hà Nội',
        ]);
    }
}
