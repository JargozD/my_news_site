@extends('layouts')

@section('main_content')

<!-- Главные Новости -->
@include('home_categories', ['newsDatas' => $newsDataGeneral, 'header' => 'Главные Новости'])



<!-- Новости Бизнеса -->
@include('home_categories', ['newsDatas' => $newsDataBusiness, 'header' => 'Новости Бизнеса'])


<!-- Новости Развлечений -->
@include('home_categories', ['newsDatas' => $newsDataEntertainment, 'header' => 'Новости Развлечений'])


<!-- Новости Здоровья -->
@include('home_categories', ['newsDatas' => $newsDataHealth, 'header' => 'Новости Здоровья'])


<!-- Новости Науки -->
@include('home_categories', ['newsDatas' => $newsDataScience, 'header' => 'Новости Науки'])


<!-- Новости Спорта -->
@include('home_categories', ['newsDatas' => $newsDataSports, 'header' => 'Новости Спорта'])


<!-- Новости Технологий -->
@include('home_categories', ['newsDatas' => $newsDataTechnology, 'header' => 'Новости Технологий'])

@endsection