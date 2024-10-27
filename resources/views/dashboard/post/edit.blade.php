@extends('dashboard.master')

@section('content')

    @include('dashboard/fragment/errors-form')

    <form action="{{route('post.update',$post->id)}}" method="post">
        @method('PATCH')
        @csrf
        <label for="">title</label>
        <input type="text" name="title" value="{{$post->title}}">

        <label for="">slug</label>
        <input type="text" name="slug" value="{{$post->slug}}">

        <label for="">Content</label>
        <textarea name="content">{{$post->content}}</textarea>

        <label for="">Category</label>

        
        <select name="category_id" >

            {{----- como ya hicimos un get, nos trae todas las categorías, y nadamas las ponemos en un option con un foreach----
            @foreach ($categories as $c)
                <option value="{{$c->id}}">{{$c->title}}</option>
            @endforeach--}}

            @foreach ($categories as $title => $id)
                <option {{$post->category && $post->category->id==$id ? 'selected':''}} value="{{ $id }}">{{ $title }}</option>
            @endforeach



        </select>


        <label for="">Description</label>
        <textarea name="description">{{$post->description}}</textarea>

        <label for="">Posted</label>
        <select name="posted" id="">
            <option {{$post->posted=='not' ? 'selected':''}} value="not">no</option>
            <option {{$post->posted=='yes' ? 'selected':''}} value="yes">yes</option>
        </select>
        

        <button type="submit">send</button>
    </form>
@endsection
