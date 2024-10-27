<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\PutRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with('categories')->paginate(2);//--------------paginate es para poner la cantidad de datos en cada página
                    //el With categories es para hacer referencia o JOIN con esa tabla
        return view('dashboard.post.index')->with('posts',$posts);

        //$post->delete();


        /*$post->update(
            [
                'title' => 'test title NEW',
                'slug' => 'test slug',
                'content' => 'test content',
                'image' => 'test image',
            ]
        );*/

        /*Post::create(
            [
                'title' => 'test title 33',
                'slug' => 'test slug 223',
                'content' => 'test content 223',
                'category_id' => 1,
                'description' => 'test description 23',
                'posted' => 'not',
                'image' => 'test image',
            ]
        );*/
    }


    public function create()
    {
        $categories = Category::get();//---------get para traer todos los registros, ya no necesitamos hacer una consulta SQL
        //$categories = Category::pluck('id', 'title');
        //dd($categories);
        return view('dashboard.post.create')->with('categories', $categories); //Retorna al formulario
    }


    public function store(StoreRequest $request)//-----Es la validacion de los campos como la longitud, tipos de datos, imagenes, etc
    {
        Post::create($request->validated());
        //Post::create($request->all());
        //return to_route('post.index');
    }


    public function show(Post $post)
    {
        //
    }

//---------------------------------------------------------------------------------
    public function edit(Post $post)
    {
        $post->load('categories'); // Cargar la relación de categoría para el post
        $categories = Category::pluck('id','title');//------el pluck sirve para traer solo ciertos atributos de la tabla, osea si no quieres traer todo
        
        return view('dashboard.post.edit',compact('categories','post'));
    }

    public function update(PutRequest $request, Post $post)
    {
        $validatedData = $request->validated();

        // Actualiza el post con los datos validados
        $post->update($validatedData);
        return to_route('post.index');
    }


/*
public function edit(Post $post)
    {
        $categories = Category::all();//------------con category all me traigo todos los datos de esa tabla 
        return view('dashboard.post.edit',compact('categories','post'))->with('categories',$categories);
    }

*/
//---------------------------------------------------------------------------------

    public function destroy(Post $post)
    {
        //
    }
}
