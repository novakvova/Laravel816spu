@extends('layouts.app')

@section('content')
    <h1 class="text-center m-4">Список постів</h1>
    @foreach($items as $item)
        @if($item["is_published"]==1)
            <div class="row w-75 m-auto">
                <div class="col-lg-12 bg-dark border mb-4 text-white">
                    <h1 class="mt-4">{{$item['title']}}</h1>
                    <p class="lead">
                        Category: <a href="#">
                            {{$item->Category["name"]}}

                        </a>

                        Tags:
                        @foreach ($item->Tags as $tag)
                            <a href="#">
                                {{$tag["name"]}}
                            </a>
                        @endforeach


                    </p>
                    <hr class="bg-light">
                    <p class="text-secondary">Posted on {{date('F d, Y', strtotime($item['created_at']))}}
                        at {{date('H:i', strtotime($item['created_at']))}}</p>
                    <hr class="bg-light">
                    <p class="lead text-center">{{$item['description_short']}}</p>

                    <p class="text-center">{!!$item['description']!!}</p>
                    <hr class="bg-light">
                    <div>Share with friends this URL: <a href="{{$item['url']}}">{{$item['url']}}</a></div>
                    <hr class="bg-light">
                    <p class="float-right text-secondary">Updated on {{date('F d, Y', strtotime($item['updated_at']))}}
                        at {{date('H:i', strtotime($item['updated_at']))}}</p>
                </div>
            </div>
        @endif
    @endforeach
@endsection
