<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models as modelo;
use Illuminate\Http\Request;
use Crypt;
class NoticiaController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function list()
	{
		$noticias = modelo\Noticia::where('images.pertenece',modelo\Noticia::class)
	->join('images','images.noticia_id','=','noticias.id')
	->select('noticias.*','images.url','images.url');
		return view('noticias.listar',compact('noticias'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('noticias.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'titulo'=>['required','string','Min:10'],
			'extracto'=>['required','string','Min:20'],
			'cuerpo'=>['required','string','Min:200'],
			'foto'=>['required','image'],
			'state'=>['required'],

		]);
	
		$count = modelo\Image::count();
		$count++;
		$image = $request->file('foto');
	
		$photo = str_replace($image->getClientOriginalName(),"noticia$count.png", $image->getClientOriginalName());
		$photo = strtolower(str_replace(' ',null, $photo));
		 $path =  public_path()."/img/dinamic";
		$image->move($path,$photo);
		$url = $request->root()."/img/dinamic/$photo";


		$noticia = modelo\Noticia::create([
			'titulo'=>$request->titulo,
			'extracto'=>$request->extracto,
			'cuerpo'=>$request->cuerpo,
			'state'=>$request->state,
			'fecha'=>now()
		]); 



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
		$noticia = modelo\Noticia::findOrfail($id);
		return view('noticias.ver',compact('noticia'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request,$id)
	{
		

		$noticia =modelo\Noticia::join('images','images.noticia_id','=','noticias.id')->find($id);


		$noticia->titulo = $request->titulo;
		$noticia->extracto = $request->extracto;
		$noticia->cuerpo = $request->cuerpo;
		$noticia->update();

		$fotoUpdate = modelo\Image::join('noticias','noticias.id','=','images.noticia_id')->find($noticia->id);

		$url = 'https://host.com/img/dinamic/fotoactualizada.png';
		$fotoUpdate->url = $url;

		$fotoUpdate->update();


		return redirect("Noticia/ver/$id");
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
        // ->where('noticias.state',true)
        ->paginate(5);

        return response()->json($noticias);
	}
}
