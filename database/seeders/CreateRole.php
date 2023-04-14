<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class CreateRole extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'admin'],
            ['name' => 'authUser']
        ];
        
        foreach ($roles as $role){
          Role::create($role);
        }
        
        $user = User::where('email', 'admin_101@gmail.com')->first();
        $user->assignRole('admin');
    }
}
