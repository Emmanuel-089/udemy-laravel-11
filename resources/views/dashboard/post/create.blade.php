@extends('dashboard.master')

@section('content')

    @include('dashboard/fragment/errors-form')

    <form action="{{route('post.store')}}" method="post">
        @include('dashboard.post.form')
    </form>
@endsection
