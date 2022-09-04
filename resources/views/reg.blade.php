@extends('layouts')

@section('main_content')

<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-3">Регистрация</h1>
            <p class="col-lg-10 fs-4">Ваши личные данные будут использоваться для упрощения вашей работы с сайтом, управления доступом к вашей учетной записи и для того, чтобы нам было проще вас идентифицировать.</p>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">

            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $err)
                    <li>{{$err}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form class="p-4 p-md-5 border rounded-3 bg-light" action="/reg/submit" method="post">

                @csrf

                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Имя">
                    <label for="name">Ваше имя:</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                    <label for="email">Почта:</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Пароль">
                    <label for="password">Пароль:</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Зарегистрироваться</button>
                <hr class="my-4">
                <small class="text-muted">Нажимая на кнопку "Зарегистрироваться", вы соглашаетесть с правилами пользования.</small>
            </form>
        </div>
    </div>
</div>
@endsection