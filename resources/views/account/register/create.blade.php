@extends('layouts.app')

@section('content')

    <h1 class="text-center m-4">Реєстрація</h1>
    <form class="mr-4 ml-4" method="POST" action="/register">
        @csrf

        @if(count($errors))
            <div class="form-group">
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <div class="form-group">
            <label for="name">Повне ім'я:</label>
            <input type="text" class="form-control" id="name" name="name"
                   value="{{ old('name') }}"
                   placeholder="Ім'я">
        </div>

        <div class="form-group">
            <label for="email">Пошта:</label>
            <input type="text" class="form-control"
                   id="email" name="email"
                   value="{{ old('email') }}"
                   placeholder="Пошта">
        </div>

        <div class="form-group">
            <label for="password">Пароль:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Пароль">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Підтвердження паролю:</label>
            <input type="password" class="form-control" id="password_confirmation"
                   name="password_confirmation" placeholder="Підтвердження паролю">
        </div>

        <input class="btn btn-success float-right mt-3" type="submit" value="Реєстрація">
    </form>

@endsection
