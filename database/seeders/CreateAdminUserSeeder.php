<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateAdminUserSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
    $user = User::create([
        'username' => ' safa ',
        'email' => 'safa@yahoo.com',
        'password' => bcrypt('123456'), 
        'status' => "active",
        'phone_number' => '888888888',
        ]);

$role = Role::create(['name' => 'admin']);
$permissions = Permission::pluck('id','id')->all();
$role->syncPermissions($permissions);
$user->assignRole([$role->id]);
}
}

//php artisan db:seed --class=CreateAdminUserSeeder