<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Role::create(['name'=>'noticiero']);
    	Role::create(['name'=>'administrador']);
    	Role::create(['name'=>'TIC']);

    	$user1 = User::create([
    		'name'=>'Gerencia',
    		'lastname'=>'de tecnologia',
    		'username'=>'tecnologia',
    		'state'=>true,
    		'password'=>bcrypt('s0p0rt32021')
    	]);
    }
}
