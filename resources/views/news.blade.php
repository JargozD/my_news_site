@extends('layouts')

@section('main_content')
<h1>Найдите любую новость</h1>
<form action="/news/search" method="get">

    @csrf

    <div class="form-group">
        <label for="q">Поиск: </label>
        <input type="text" name="q" placeholder="Введите запрос" id="name" class="form-control">
    </div>

    <div class="form-group">
        <label for="from">Найти от: </label>
        <input type="date" name="from" placeholder="Введите запрос" id="from" class="form-control">
    </div>

    <div class="form-group">
        <label for="to">Найти до: </label>
        <input type="date" name="to" placeholder="Введите запрос" id="to" class="form-control">
    </div>

    <div class="col-12">
        <button type="search" class="btn btn-success">Найти</button>
    </div>

</form>

@if(isset($newsData))
<!-- <?php var_dump($newsData); ?> -->
<hr>
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

<ul class="pagination">
    <li class="page-item"><a href="?page=1">1</a></li>
    <li class="page-item"><a href="?page=2">2</a></li>
    <li class="page-item"><a href="?page=3">3</a></li>
    <li class="page-item"><a href="?page=4">4</a></li>
    <li class="page-item"><a href="?page=5">5</a></li>
</ul>


@endif

@endsection