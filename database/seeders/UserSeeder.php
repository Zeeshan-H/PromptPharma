<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(
            [
                'name' => 'customer', 
                'description' => 'Customer Role'
            ]
        );

        $role = Role::create(
            [
                'name' => 'admin', 
                'description' => 'Admin Role'
            ]
        );

        $user = User::create(
            [
                'role_id' => $role->id,
                'f_name' => 'Rizwan',
                'l_name' => 'Ahmed',
                'address' => 'Lahore, Punjab',
                'email' => 'admin@admin.com', 
                'password' => bcrypt('secret'),
                
            ]
        );

    }
}
