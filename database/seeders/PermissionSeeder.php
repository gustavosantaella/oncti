<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/*Noticias*/
      Permission::create(['name'=>'crear noticia']);
      Permission::create(['name'=>'listar noticias']);
      Permission::create(['name'=>'eliminar noticia']);
      Permission::create(['name'=>'modificar noticia']);
      Permission::create(['name'=>'ver noticia']);
      /*end noticias*/

      /*roles*/
      Permission::create(['name'=>'crear rol']);
      Permission::create(['name'=>'listar roles']);
      Permission::create(['name'=>'modificar rol']);
      Permission::create(['name'=>'ver rol']);
      Permission::create(['name'=>'acceso a permisos']);
      /*end roles*/

      /*users*/
      Permission::create(['name'=>'crear usuario']);
      Permission::create(['name'=>'modificar usuario']);
      Permission::create(['name'=>'listar usuarios']);
      Permission::create(['name'=>'eliminar usuario']);
      /*end users*/
    }
}
