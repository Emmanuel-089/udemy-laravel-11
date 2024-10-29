@extends('dashboard.master')

@section('content')

    <table>
        <thead>
            <tr>
                <td>title</td>
                <td>slug</td>
            </tr>
            
        
        </thead>
        
        <tbody>
            <tr>
                <td>{{$category->title}}</td>
    
                <td>{{$category->slug}}</td>
            </tr>
            
        </tbody>
    

    </table>
@endsection
