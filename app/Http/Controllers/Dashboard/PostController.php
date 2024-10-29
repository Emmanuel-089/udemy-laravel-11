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
        $posts = Post::with('category')->paginate(2);//--------------paginate es para poner la cantidad de datos en cada página
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
        //$categories = Category::get();//---------get para traer todos los registros, ya no necesitamos hacer una consulta SQL
        $categories = Category::pluck('title','id');//---pluck para traer solo title y id(title porque así se llama la categoría y id por el join)
        //dd($categories);
        $post=new Post();
        return view('dashboard.post.create', compact('categories','post'))->with('category', $categories); //Retorna al formulario
    }


    public function store(StoreRequest $request)//-----Es la validacion de los campos como la longitud, tipos de datos, imagenes, etc
    {
        Post::create($request->validated());
        //Post::create($request->all());
        //return to_route('post.index');
    }


    public function show(Post $post)
    {

        return view('dashboard/post/show',['post'=>$post]);
    }

//---------------------------------------------------------------------------------
    public function edit(Post $post)
    {
        $post->load('category'); // Cargar la relación de categoría para el post
        $categories = Category::pluck('title','id');//------el pluck sirve para traer solo ciertos atributos de la tabla, osea si no quieres traer todo
        
        return view('dashboard.post.edit',compact('categories','post'));
    }

    public function update(PutRequest $request, Post $post)
    {
        $data = $request->validated();
        
        //Campo para subir archivos
        //primero se carga la validación de la imagen
            //Y despues con el if(), se pregunta si existe una imagen cargada o no, ya que es opcional---- recordemos que 'image' ya lo 
                                                                                                        //tenemos en nuestra base de datos
        if(isset($data['image'])){        
            $data['image']=$filename=time().'.'.$data['image']->extension();//esta linea es la forma que va a tomar la imagen que se suba
                                // a la base de datos, en este caso (filename=time(052928102024)->la hora )
                                        //   '.' se le pone porque la imagen necesita la extension de .jpg y ->extension es la extención de la imagen(jpeg, png)                                                                       
            $request->image->move(public_path('uploads/posts'),$filename);
        }
        // Actualiza el post con los datos validados
        $post->update($data);
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
//   Función Eliminar
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('post.index');
    }
}
