<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;

use App\Models\Category;
//post
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::paginate(4);
        return view('dashboard.category.index')->with('category',$category);

    }
    public function create()
    {

        $category=new Category();
        return view('dashboard.category.create', compact('category'))->with('category', $category); //Retorna al formulario categories
    }


    public function store(StoreCategoryRequest $request)//-----Es la validacion de los campos como la longitud, tipos de datos, imagenes, etc
    {
        Category::create($request->validated());

    }
//-----------------------------------------------------------yaaaaaaaaaaaaaaaaaa

    public function show(Category $category)
    {

        return view('dashboard/category/show',['category'=>$category]);
    }

//---------------------------------------------------------------------------------
    public function edit(Category $category)
    {

        return view('dashboard.category.edit',compact('category'));
    }

    public function update(StoreCategoryRequest $request, Category $category)
    {
        $data = $request->validated();

        $category->update($data);
        return to_route('categories.index');
    }
//---------------------------------------------------------------------------------
//   Función Eliminar
    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('categories.index');
    }
}
