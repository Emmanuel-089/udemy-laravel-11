@extends('dashboard.master')

@section('content')

    @include('dashboard/fragment/errors-form')

    <form action="{{route('post.store')}}" method="post">
        @csrf
        <label for="">title</label>
        <input type="text" name="title">

        <label for="">slug</label>
        <input type="text" name="slug">

        <label for="">Content</label>
        <textarea name="content"></textarea>

        <label for="">Category</label>

        
        <select name="category_id" >

            //----- como ya hicimos un get, nos trae todas las categorías, y nadamas las ponemos en un option con un foreach------//
            @foreach ($categories as $c)
                <option value="{{$c->id}}">{{$c->title}}</option>
            @endforeach
        </select>


        <label for="">Description</label>
        <textarea name="description"></textarea>

        <label for="">Posted</label>
        <select name="posted" id="">
            <option value="yes">Yes</option>
            <option value="not">No</option>
        </select>
        

        <button type="submit">send</button>
    </form>
@endsection
