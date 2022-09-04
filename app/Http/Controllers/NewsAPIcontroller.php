<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationData;
use App\Models\NewsAPI;
use App\Services\NewsApi\NewsApiService;
use Illuminate\Support\Facades\Http;
use League\CommonMark\Node\Query\OrExpr;

class NewsAPIcontroller extends Controller
{
    /**
     * Заполнение запроса данными на основе указанных параметров расположенных на странице news.blade.php
     * и отправление данных на ту же страницу в виде массива 'newsData'
     * 
     * @param   $req->input('q'),           Ключевое слово запроса
     * @param   $req->input('from'),        С какой даты показывать новости
     * @param   $req->input('to'),          До какой даты показывать новости
     * @param   $req->input('language'),    На каком языке показывать новости
     * @param   $req->input('pageSize'),    Сколько результатов нужно показывать на одной странице
     * @param   $req->input('page')         Какая страница показывается по умолчанию
     * 
     */
    public function search(Request $req, NewsApiService $newsApiService)
    {
        $response = $newsApiService->search(
            $req->input('q'),
            $req->input('from'),
            $req->input('to'),
            $req->input('language'),
            $req->input('pageSize'),
            $req->input('page')
        );

        $req->flash();
        return view('news')->with(['newsData' => $response]);
    }

    /**
     * Отправка данных, состоящих из блоков по 5 новостей каждой категории на главную страницу
     * 
     */
    public function mainPageNews(NewsApiService $newsApiService)
    {
        return view('home')
            ->with(['newsDataGeneral' => $newsApiService->getTopHeadlinesByCategory('general')])
            ->with(['newsDataBusiness' => $newsApiService->getTopHeadlinesByCategory('business')])
            ->with(['newsDataEntertainment' => $newsApiService->getTopHeadlinesByCategory('entertainment')])
            ->with(['newsDataHealth' => $newsApiService->getTopHeadlinesByCategory('health')])
            ->with(['newsDataScience' => $newsApiService->getTopHeadlinesByCategory('science')])
            ->with(['newsDataSports' => $newsApiService->getTopHeadlinesByCategory('sports')])
            ->with(['newsDataTechnology' => $newsApiService->getTopHeadlinesByCategory('technology')]);
    }

}
