@extends('layouts.app')

@section('content')
    <h1 class="text-center m-4">Create New Post</h1>
    <form class="mr-4 ml-4" method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="title">
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <select class="form-control" id="category" name="id_category">
                @foreach($category as $item)
                    <option value="{{$item['id']}}">{{$item['name']}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group row">
            <label for="description_short" class="col-sm-2 col-form-label">Short description</label>
            <div class="col-sm-10">
                <input type="text" name="description_short" class="form-control" id="description_short" placeholder="Short description">
            </div>
        </div>

        <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">Choose Image</label>
            <div class="col-sm-10">
                <input id="image" type="file" name="image">
            </div>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
{{--            <div style="height: 170px" id="editor" class="w-100 p-4"></div>--}}
            <div class="w-100 p-4">
                <textarea id="description" name="description"></textarea>
            </div>
        </div>

        <input class="btn btn-success float-right mt-3" type="submit" value="Add">
    </form>
{{--    @include("layouts._quilleditor")--}}


    <!-- Include Editor JS files. -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/js/froala_editor.pkgd.min.js"></script>

    <!-- Initialize the editor. -->
    <script>
        //var csrf_token = $('meta[name="csrf-token"]').attr('content');
        new FroalaEditor('#description', {
            attribution: false,
            // Set the file upload URL.
            imageUploadURL: '/posts/upload',

            imageUploadParams: {
                id: 'my_editor',
                _token: "{{ csrf_token() }}"
            },
        });
        //setTimeout(() => document.querySelector("div.fr-wrapper.show-placeholder > div").style.display = 'none', 400);

    </script>
    <style>
        div.fr-wrapper > div:first-child {
            display: none !important;
            visibility: hidden !important;
        }
    </style>
@endsection
