@extends('dashboard.master')

@section('content')

    @if ($errors->any())
        @foreach ($errors->all() as $e)
            <div>{{$e}}</div>
        @endforeach
        
    @endif
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
