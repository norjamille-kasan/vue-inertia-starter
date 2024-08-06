<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InitialUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $superAdmin = User::create([
            'name'=>'Super Admin',
            'email'=>'super@gmail.com',
            'password'=> bcrypt('password')
        ]);
        $superAdmin->assignRole('Super Admin');

        $superAdmin = User::create([
            'name'=>'Store Admin',
            'email'=>'defaultstore@gmail.com',
            'password'=> bcrypt('password')
        ]);
        $superAdmin->assignRole('Super Admin');
    }
}
