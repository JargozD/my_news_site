@extends('layouts')

@section('main_content')

<div class="b-example-divider"></div>
<div class="px-4 py-5 my-5 text-center">
    <svg xmlns="http://www.w3.org/2000/svg" width="72" height="57" fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
        <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z" />
        <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z" />
    </svg>
    <h1 class="display-5 fw-bold">WWNews</h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Данный сайт является тестовым проектом. Здесь вы можете найти любые новости из любой точки мира. На главной странице представлены самые горячие последние новости, по 5 штук на каждую категорию. На странице поиска вы можете указать критерии своего запроса и найти до 100 новостей согласно вашим предпочтениям.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="/" type="button" class="btn btn-primary btn-lg px-4 gap-3">На главную</a>
            <a href="/news" type="button" class="btn btn-outline-secondary btn-lg px-4">К поиску</a>
        </div>
    </div>
</div>
<div class="b-divider"></div>

@endsection