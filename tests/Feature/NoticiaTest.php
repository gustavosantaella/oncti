<?php

namespace Tests\Feature;

use App\Models\Noticia;
use App\Models\Image;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use factory;

class NoticiaTest extends TestCase
{
	use RefreshDatabase;


/**
 * Store new succefully
 *
 * 
 * @test
 */

public function CreateNew()
{
	$this->withoutExceptionHandling();
	$response = $this->get('Noticia/crear');

	$response->assertStatus(200);
	$response->assertViewIs('noticias.create');
}


/**
 * Store new succefully
 *
 * 
 * @test
 */


public function StoreNew()
{
	$this->withoutExceptionHandling();

	$response = $this->post('Noticia/crear',[

		'titulo'=>'titlo de la noticia creada',
		'extracto'=>'extracto de la noticia',
		'foto'=>'https://host.com/img/dinamic/foto.png',
		'state'=>false,
		'cuerpo'=>'cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia cuerpo de la notcia'

	]);

	$this->assertDatabaseHas('images',[
		'id'=>1,
		'noticia_id'=>1,
		'url'=>'https://host.com/img/dinamic/foto.png',
		'pertenece'=>"".Noticia::class."",
	]);


	$this->assertCount(1,Noticia::all());
	$this->assertCount(1,Image::all());
	$noticia = Noticia::first();

	$this->assertEquals($noticia->titulo,'titlo de la noticia creada');

	$response->assertRedirect("Noticia/ver/$noticia->id");
}


/**
 * Store new succefully
 *
 * 
 * @test
 */

public function ListNews()
{

	$this->withoutExceptionHandling();

	$response = $this->get('Noticia/listar');
	Noticia::factory()->create();
	Image::factory()->create();
	$noticias = Noticia::where('images.pertenece',Noticia::class)
	->join('images','images.noticia_id','=','noticias.id')
	->select('noticias.*','images.url','images.url');

	$response->assertOk();

	$response->assertViewIs('noticias.listar');
	$response->assertViewHas('noticias',$noticias);



}


/**
 * Store new succefully
 *
 * 
 * @test
 */

public function getNew()
{
	$this->withoutExceptionHandling();

	Noticia::factory()->create();
	Image::factory()->create();
	$noticia = Noticia::first();

	$response = $this->get("Noticia/ver/$noticia->id");
	

	$response->assertOk();

	$response->assertViewIs('noticias.ver');
	$response->assertViewHas('noticia', $noticia);

}


/**
 * Store new succefully
 *
 * 
 * @test
 */

public function updateNew()
{
	$this->withoutExceptionHandling();
	Noticia::factory()->create();
Image::factory()->create();
	$noticia = Noticia::first();
	$Image = Image::first();

	$response = $this->put("Noticia/actualizar/$noticia->id",[

		'titulo'=>'titulo de la noticia actualizada',
		'extracto'=>'extracto de la noticia actualizada',
		'state'=>true,
		'cuerpo'=>'cuerpo de la notcia actualizada',
		'fecha'=>now(),
		'pertenece'=>"".Noticia::class.""

	]);

	$this->assertDatabaseHas('images',[
		'noticia_id'=>$noticia->id,
		'url'=>'https://host.com/img/dinamic/fotoactualizada.png',
		'pertenece'=>"".Noticia::class."",
	]);
	$noticia = $noticia->fresh();
	$Image = $Image->fresh();
	

	$this->assertCount(1,Noticia::all());
	$this->assertCount(1,Image::all());

	

	$this->assertEquals($noticia->titulo,'titulo de la noticia actualizada');

	$response->assertRedirect("Noticia/ver/$noticia->id");

}

/**
 * Store new succefully
 *
 * 
 * @test
 */

public function deleteNew()
{
	$this->withoutExceptionHandling();
	Noticia::factory()->create();
	$noticia = Noticia::first();
	$response = $this->delete("Noticia/eliminar/$noticia->id");

	$response->assertStatus(302);
	$response->assertRedirect("Noticia/listar");

}







}
