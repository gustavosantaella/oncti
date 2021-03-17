<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models as modelo;
use Crypt;
use File;
use Illuminate\Http\Request;
use App\Http\Requests\RequestFormNew;
class NoticiaController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function list()
	{
		$noticias = modelo\Noticia::paginate(5);
		return view('noticias.listar',compact('noticias'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$noticia =new  modelo\Noticia;
		return view ('noticias.create',compact('noticia'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(RequestFormNew $request)
	{
		 $state = ((boolean)$request->state);
		$noticia = modelo\Noticia::create([
			'titulo'=>$request->titulo,
			'extracto'=>$request->extracto,
			'cuerpo'=>$request->cuerpo,
			'state'=>$state,
			'fecha'=>now()
		]); 

		$image = $request->file('foto');

		$photo = str_replace($image->getClientOriginalName(),"noticia$noticia->id.png", $image->getClientOriginalName());
		$photo = strtolower(str_replace(' ',null, $photo));
		$path =  public_path()."/img/dinamic";
		$image->move($path,$photo);
		$url = $request->root()."/img/dinamic/$photo";

		$fotoCreate = modelo\Image::create([
			'url'=>$url,
			'noticia_id'=>$noticia->id,
			'pertenece'=>modelo\Noticia::class

		]);
		

		$id = Crypt::encryptString($noticia->id);

			return redirect("Noticia/ver/$noticia->id");


	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		// $id = (integer)Crypt::decryptString($id);
		$noticia = modelo\Noticia::join('images','images.noticia_id','=','noticias.id')->find($id);
		return view('noticias.ver',compact('noticia'));
	}

	public function edit($id)
	{
		// $id = (integer)Crypt::decryptString($id);
		$noticia = modelo\Noticia::join('images','images.noticia_id','=','noticias.id')->findOrfail($id);
		return view('noticias.edit',compact('noticia','id'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, modelo\Noticia $id)
	{
		$this->validate($request,[
			'titulo'=>['required','string','Min:10'],
			'extracto'=>['required','string','Min:20'],
			'cuerpo'=>['required','string','Min:50'],
			'state'=>['required'],
		]);
	


		$id->titulo = $request->titulo;
		$id->extracto = $request->extracto;
		$id->cuerpo = $request->cuerpo;
		$id->state = $request->state;
		$id->update();


		return redirect("Noticia/ver/$id->id");
	}

	public function updatePhoto(Request $request,modelo\Image $id)
	{
		$this->validate($request, [
			'foto'=>['required','image']
		]);
	/*	$fotoUpdate = modelo\Image::join('noticias','noticias.id','=','images.noticia_id')->find($id);*/

		$image = $request->file('foto');

		$photo = str_replace($image->getClientOriginalName(),"noticia$id->noticia_id.png", $image->getClientOriginalName());
		$photo = strtolower(str_replace(' ',null, $photo));
		$path =  public_path()."/img/dinamic";
		$image->move($path,$photo);
		$url = $request->root()."/img/dinamic/$photo";
		$id->url = $url;

		$id->update();
		return redirect("Noticia/ver/$id->noticia_id");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$noticia = modelo\Noticia::find($id);
		$img = modelo\Image::where('noticia_id',$id)->first();
		$img = str_replace(request()->root(),null,$img->url);

		File::delete(public_path().$img);
		$noticia->delete();
		return redirect()->route('noticias.listar');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  void
	 * @return \Illuminate\Http\Response
	 */

	public function api_get_news()
	{

		$noticias =  modelo\Noticia::join('images','images.noticia_id','=','noticias.id')
		->where('noticias.state',true)
		->paginate(5);

		return response()->json($noticias);
	}

	public function api_get_new($id)
	{
		$noticia =  modelo\Noticia::join('images','images.noticia_id','=','noticias.id')
		->where('noticias.state',true)
		->find($id);

		return response()->json($noticia);
	}
}
