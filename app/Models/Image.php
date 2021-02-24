<?php

namespace App\Models;

use App\Models\Noticia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['noticia_id','url','pertenece'];
/*    protected $timestamps  = false;*/


 public function Noticia()
    {
        return $this->belongsTo(Noticia::class,'noticia_id');
    }
}
