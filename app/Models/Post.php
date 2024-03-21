<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;
  //colocamos los campos que no quiero que se llenen por asignación masiva es lo contrario del fillable
  protected $guarded = ['id', 'created_at', 'update_at'];

  //uno a muchos inversa

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  //  Relación muchos a muchos
  public function tags()
  {
    return $this->belongsToMany(Tag::class);
  }

  //relación uno a uno polimorfica
  public function image()
  {
    return $this->morphOne(Image::class, 'imageable');
  }
  //mostrar el nombre en lugar del numero (borrador 1,publicado 2)
  public function getStatusTextAttribute()
  {
    return $this->attributes['status'] == 1 ? 'Borrador' : 'Publicado';
  }
}
