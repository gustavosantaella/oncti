<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models as model;
use App\Http\Requests\userRequest;
use Hash, Auth;

class UserController extends Controller
{
	private $roles;

	public function __construc(){
		$this->roles = array();

	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$users  = model\User::all();

		return view('user.list',compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$roles = Role::all();
		$user = new model\User;
		foreach ($roles as $rol ) {
			$this->roles[$rol->name]['check'] = false;
			$this->roles[$rol->name]['id'] = $rol->id;
		}

		$roleUser = $this->roles;
		return view('user.create',compact('roles','user','roleUser'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(userRequest $request)
	{
		$password= Hash::make($request->password);

		$user = model\User::create([
			'name'=>strtoupper($request->name),
			'lastname'=>strtoupper($request->lastname),
			'username'=>strtolower($request->username),
			'state'=>($request->state),
			'password'=>($password),

		]);

		$user->assignRole($request->role);


		return redirect()
		->back()
		->with('message','Se ha creado exitosamente')
		->with('type','success');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function login()
	{
		return view('user.login');
	}

	public function signIn(Request $request){
		$credenciales = $this->validate($request,[
			'username'=>'required',
			'password'=>'required',
		]);
		$user = Auth::attempt($credenciales);

		if (!$user) {

			return redirect()->back()->with('message','Alguno de los campos es incorrecto')->with('type','warning');
		}

		$request->session()->regenerate();

		return redirect()->route('welcome');

	}

	public function logout(){

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(model\User $user)
	{
		$roles = Role::all();
		$haveRol = $user->roles()->get();

		$this::haveRol($roles,$haveRol);

		$roleUser = $this->roles;
		return view('user.edit',compact('user','roles','roleUser'));


		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, model\User $user)
	{
		$this->validate($request,[
			'name'=>['required','alpha'],
			'lastname'=>['required','alpha'],
			'username'=>['required','unique:users,username,'.$user->id.',id','alpha'],
			'password'=>'required|alpha_num'

		]);


		$user->name = strtoupper($request->name);
		$user->lastname = strtoupper($request->lastname);
		$user->username = $request->username;
		$user->state = $request->state;
		$user->password = Hash::make($request->password);
		$user->syncRoles($request->role);
		$user->update();
		return redirect()->route('editar.user',$user->id)->with('message','Actualizado exitosamente')->with('type','success');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(model\User $user)
	{
		$user->delete();

		return redirect()->back()->with('message','Eliminado exitosamente')->with('type','info');
	}

	private function haveRol($roles,$haveRol){

		foreach ($roles as $rol) {
			if ($haveRol->contains($rol)) {
				$this->roles[$rol->name]['check'] = true;

			}else{
				$this->roles[$rol->name]['check'] = false;
			}
			$this->roles[$rol->name]['id'] = $rol->id;
		}
	}
}
