<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::find(3);

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
        $categories = Category::get();
        //$categories = Category::pluck('id', 'title');
        //dd($categories);
        return view('dashboard.post.create')->with('categories', $categories); //Retorna al formulario
    }


    public function store(StoreRequest $request)
    {
        Post::create($request->validated());
        //Post::create($request->all());
        //return to_route('post.index');
    }


    public function show(Post $post)
    {
        //
    }


    public function edit(Post $post)
    {
        //
    }

    public function update(Request $request, Post $post)
    {
        //
    }


    public function destroy(Post $post)
    {
        //
    }
}
