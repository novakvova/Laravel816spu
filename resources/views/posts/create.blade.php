@extends('layouts.app')

@section('content')
    <h1 class="text-center m-4">Create New Post</h1>
    <form class="mr-4 ml-4" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" placeholder="title">
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <select class="form-control" id="category">
                @foreach($category as $item)
                    <option data-id="{{$item['id']}}">{{$item['name']}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <div style="height: 170px" id="editor" class="w-100 p-4"></div>
        </div>

        <input class="btn btn-success float-right mt-3" type="submit" value="Add">
    </form>
{{--    @include("layouts._quilleditor")--}}
@endsection
