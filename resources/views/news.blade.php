@extends('layouts')

@section('main_content')


<div class="px-4 py-5 my-5 text-center">
    <svg xmlns="http://www.w3.org/2000/svg" width="72" height="57" fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
        <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z" />
        <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z" />
    </svg>
    <h1 class="display-5 fw-bold">Найдите любую новость</h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Введите запрос ниже, чтобы начать поиск.</p>

        @if(isset($newsData['error']))
        <div class="alert alert-danger">
            {{$newsData['error']}}
        </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif

        <form class="p-4 p-md-5 border rounded-3 bg-light" action="/news" method="post">

            @csrf

            <input type="hidden" name="page" id="page" value="{{old('page') ?? 1}}">

            <div class="form-group mb-3">
                <label for="q">Что ищем? </label>
                <input type="text" name="q" placeholder="Введите запрос" id="q" class="form-control" value="{{old('q')}}">
            </div>

            @if(Auth::check() == true)
                <div class="form-group mb-3">
                    <label for="from">Найти от </label>
                    <input type="date" name="from" id="from" class="form-control" value="{{old('from')}}">
                </div>

                <div class="form-group mb-3">
                    <label for="to">Найти до </label>
                    <input type="date" name="to" id="to" class="form-control" value="{{old('to')}}">
                </div>

                <div class="form-group mb-3">
                    <label for="language">На каком языке показать новости </label>
                    <select class="form-select" aria-label="Default select example" name="language" id="language">
                        <option value="ru" @selected(old('language')==null or old('language')=='ru' )>Русский</option>
                        <option value="en" @selected(old('language')=='en' )>Английский</option>
                        <option value="de" @selected(old('language')=='de' )>Немецкий</option>
                        <option value="ar" @selected(old('language')=='ar' )>Арабский</option>
                        <option value="es" @selected(old('language')=='es' )>Испанский</option>
                        <option value="fr" @selected(old('language')=='fr' )>Французский</option>
                        <option value="he" @selected(old('language')=='he' )>Иврит</option>
                        <option value="it" @selected(old('language')=='it' )>Итальянский</option>
                        <option value="nl" @selected(old('language')=='nl' )>Нидерландский (Голландский)</option>
                        <option value="no" @selected(old('language')=='no' )>Норвежский</option>
                        <option value="pt" @selected(old('language')=='pt' )>Португальский</option>
                        <option value="sv" @selected(old('language')=='sv' )>Шведский</option>
                        <option value="zh" @selected(old('language')=='zh' )>Китайский</option>
                    </select>
                </div>
            @endif


            <div class="form-group mb-3">
                <label for="pageSize">Количество на странице </label>
                <select class="form-select" aria-label="Default select example" name="pageSize" id="pageSize">
                    <option value="10" @selected(old('pageSize')==null or old('pageSize')==10)>10</option>
                    <option value="15" @selected(old('pageSize')==15)>15</option>
                    <option value="20" @selected(old('pageSize')==20)>20</option>
                </select>
            </div>

            <div class="col-12">
                <button type="search" class="btn btn-lg btn-primary">Найти</button>
            </div>

        </form>
        @if(Auth::check() == false)
        <p><a href="/login">Войдите</a>, чтобы воспользоваться расширенным поиском</p>
        @endif
    </div>
</div>


@if(isset($newsData) && !isset($newsData['error']))
<hr id="newsCards">

@include('news_pagination')
<br>

<h5>Найдено результатов: {{$newsData['totalResults']}}</h5>


<div class="row row-cols-1 row-cols-md-5 g-4">
    @foreach ($newsData['articles'] as $newsCard)
    <div class="col">
        <div class="card">
            <img src="{{$newsCard['urlToImage']}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$newsCard['title']}}</h5>
                <p class="card-text">{{$newsCard['description']}}</p>
                <small class="text-muted">{{$newsCard['author']}}</small>
                <small class="text-muted">{{$newsCard['publishedAt']}}</small>
                <a href="{{$newsCard['url']}}" class="btn btn-primary">Читать далее</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

<br>
@include('news_pagination')

@endif

<script>
    const collectionLi = document.querySelectorAll('.pages__item');
    const hiddenInput = document.querySelector('#page');
    const form = document.forms[0];

    collectionLi.forEach((element) => {
        element.addEventListener('click', function() {
            hiddenInput.value = this.value;
            form.submit();
        })
    });

    collectionLi.forEach((element) => {
        if (Number(element.value) === Number(hiddenInput.value)) {
            element.classList.add('active');
        }
    })

    const element = document.getElementById("newsCards");

    element.scrollIntoView();
</script>

@endsection