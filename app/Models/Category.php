<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //habilitar asignación masiva
    use HasFactory;

    protected $fillable= ['name','slug'];

    //para que en la url aparezca el slugy no el ID
    public function getRouteKeyName()
    {
        return "slug";
    }

    //relacion uno a muchos
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
