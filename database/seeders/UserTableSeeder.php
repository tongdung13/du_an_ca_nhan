<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "tong dung";
        $user->email = "vuivui@gmail.com";
        $user->password = bcrypt("123456");
        $user->address = "thanh hoa";
        $user->image = "image1.jpg";
        $user->phone = "0356183309";
        $user->role = "1";
        $user->save();

        $user = new User();
        $user->name = "tong";
        $user->email = "vuivuibun@gmail.com";
        $user->password = bcrypt("123456a");
        $user->address = "thanh hoa";
        $user->image = "image.jpg";
        $user->phone = "0356183309";
        $user->role = "0";
        $user->save();
     }
}
