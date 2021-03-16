<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\rolRequest;


class RolController extends Controller
{
	private $permission;

	public function __construct(){
		$this->permission = array();
	}
	public function index(){
		$role = new Role;
		$permissions = Permission::all();
		foreach ($permissions as $permiso) {
			$this->permission[$permiso->name]['check'] = false;
			$this->permission[$permiso->name]['id'] = $permiso->id;
		}
		$permission_check =$this->permission;
		return view('admin.roles.insertar',compact('role','permission_check'));
	}

	public function create(){


		$roles=	Role::with('permissions')->paginate(5);
		return view('admin.roles.create',compact('roles'));

	}

	public function store(rolRequest $rol)
	{
		$role = Role::create($rol->all());

		$role->syncPermissions($rol->permission);

		return redirect()->route('crear.rol');
	}

	public function destroy(Role $id){
		$id->delete();
		return redirect()->route('crear.rol');
	}

	public function show(Role $role){

		$permissions = Permission::all();
		$havePermission =  $role->permissions()->get();
		foreach ($permissions as $permission) {
			if ($havePermission->contains($permission)) {
				$this->permission[$permission->name]['check']= true ;
			}else{
				$this->permission[$permission->name]['check']= false ;
			}
			$this->permission[$permission->name]['id']= $permission->id ;
		}

		$permission_check= $this->permission;
		return view('admin.roles.edit',compact('role','permissions','permission_check'));

	}

	public function update(Request $role, Role $id){

		$this->validate($role,[
			'name'=>['required','string','unique:roles,name,'.$id->id.',id'],
			/*'permission'=>['required']*/
		]);
		$id->name = $role->name;
		$id->update();
		$id->syncPermissions($role->permission);

		return redirect()->back();

	}

	public function ver(Role $role){
		
		
		 $this->permission[]['role']=$role;
		 $this->permission[]['permission']=$role->getAllPermissions();

		$role= $this->permission;
		
		return view('admin.roles.ver',compact('role'));
	}

}
