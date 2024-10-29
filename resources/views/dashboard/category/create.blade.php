@extends('dashboard.master')

@section('content')

    @include('dashboard/fragment/errors-form')

    <form action="{{route('categories.store')}}" method="post">
        @include('dashboard.category.form')
    </form>
@endsection
