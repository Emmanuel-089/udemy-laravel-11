@extends('dashboard.master')

@section('content')

    @include('dashboard/fragment/errors-form')

    <form action="{{route('categories.update',$category->id)}}" method="post" enctype="multipart/form-data"> {{-- Acá traemos los parámetros de la funcion update del controlador--}}
        @method('PATCH')                                           {{-- Es muy importante si queremos insertar imagenes en una visa, 
                                                                        tenemos que poner el (enctype), ya que sino laravel no nos deja 
                                                                        subir archivos a esta vista--}}
        @include('dashboard.category.form') {{-- Aca importamos la vista form. que es el formulario principal--}}
                                    {{--El edit lo ponemos como parámetro para enviarselo al formulario
                                        Y que nos lo pueda mostrar solo en esta vista de edit.blade--}}
    </form>
@endsection
