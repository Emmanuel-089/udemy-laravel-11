@extends('dashboard.master')

@section('content')
{{-- --El target blank sirve para cuando das click te abre una pestaña nueva--}}
<a href="{{route('post.create')}}" target="blank">Crear</a>

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
                    Posted
                </td>
                <td>
                    CAtegory
                </td>
                <td>
                    Options
                </td>
        </tr>
        </thead>
        <tbody>
            @foreach ($posts as $p)
            
            <tr>
                <td>
                    {{$p->id}}
                </td>
                <td>
                    {{$p->title}}
                </td>
                <td>
                    {{$p->posted}}

                </td>
                <td>
                    {{ $p->categories->title  }}
                </td>

                <td>
                    <a href="{{route('post.edit',$p->id)}}">Editar</a>
                    <a href="{{route('post.show',$p->id)}}">show</a>
                </td>
                

            </tr>             
            @endforeach
        </tbody>
    </table>

    {{$posts->links()}}
    {{--paginacion osea los numeros de pagina( pag. 1,2,3,4...)--}}

@endsection
