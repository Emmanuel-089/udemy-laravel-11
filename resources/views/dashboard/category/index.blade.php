@extends('dashboard.master')

@section('content')
{{-- --El target blank sirve para cuando das click te abre una pestaña nueva--}}


<a href="{{route('categories.create')}}" target="blank">Crear</a>

    <table>
        <thead>
            <tr>
                <td>
                    Id
                </td>
                <td>
                    Title
                </td>
                <td>
                    Slug
                </td>

        </tr>
        </thead>
        <tbody>
            @foreach ($category as $c)
            
            <tr>
                <td>
                    {{$c->id}}
                </td>
                <td>
                    {{$c->title}}
                </td>
                <td>
                    {{$c->slug}}

                </td>


                <td>
                    <a href="{{route('categories.edit',$c->id)}}">Editar</a>
                    <a href="{{route('categories.show',$c->id)}}">show</a>
                    <form action="{{route('categories.destroy',$c)}}" method="POST">
                        @method('DELETE')
                        @csrf{{--TOKEN--}}
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
                

            </tr>             
            @endforeach
        </tbody>
    </table>

    {{$category->links()}}
   {{-- paginacion osea los numeros de pagina( pag. 1,2,3,4...)--}}

@endsection
