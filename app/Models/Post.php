<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'content', 'category_id', 'description', 'posted', 'image'];

    //-----Relacion Eloquent ORM para hacer el join con una tabla
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
                //----belongsTo es para decir Uno a uno
                //    en este caso 1 post puede tener solo 1 categoría
                //    y 1 categoría puede estar unida solo a 1 post
    }
}
