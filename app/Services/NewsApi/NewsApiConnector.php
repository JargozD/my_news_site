<?php

namespace App\Services\NewsApi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

/**
     * Класс включающий в себя обращение к Эндпоинтам для поиска новостей
     * 
     * @method everything()     Эндпоинт поиска по всем новостям мира
     * @method topHeadlines()   Эндпоинт поиска по самым горячим новостям
     */
class NewsApiConnector
{
    /**
     * Поиск по всем параметрам.
     * Список возожных передаваемых параметров (Для всех параметров, перечисляемые значения задаются через запятую):
     * [
     * @param     'q' => '',              Ключевое слово запроса
     * @param     'searchIn' => '',       Поиск в заголовке\описании\тексте (title description content)
     * @param     'sources' => '',        Из ресурсов какой страны
     * @param     'domains' => '',        Адрес сайта с которого нужно получить новости (можно несколько)
     * @param     'excludeDomains' => '', Адрес сайта с которого НЕнужно получить новости (можно несколько)
     * @param     'from' => '',           С какой даты показывать новости
     * @param     'to' => '',             До какой даты показывать новости
     * @param     'language' => '',       На каком языке нужно получать новости (ar de en es fr he it nl no pt ru sv ud zh)
     * @param     'sortBy' => '',         Сортировка новостей по: (relevancy, popularity, publishedAt)
     * @param     'pageSize' => 20,       Сколько результатов нужно показывать на одной странице
     * @param     'page' => 1,            Какая страница показывается по умолчанию
     * ]
     * 
     * @param array $params
     * @return array
     */
    public function everything(array $params): array
    {
        $params['apiKey'] = config('newsAPI.api_key');
        $response = Http::get(
            config('newsAPI.everything_url'),
            $params
        )->throw();
        return $response->json();
    }

    /**
     * Поиск по главным новостям.
     * Список возожных передаваемых параметров (Для всех параметров, перечисляемые значения задаются через запятую):
     * [
     * @param     'country' => '',        Страна из которой хотите получить главные новости (ae ar at au be bg br ca ch cn co cu cz de eg fr gb gr hk hu id ie il in it jp kr lt lv ma mx my ng nl no nz ph pl pt ro rs ru sa se sg si sk th tr tw ua us ve za)
     * @param     'category' => '',       Категория по которой нужны новости (business entertainment general health science sports technology)
     * @param     'sources' => '',        Здесь указываются новостные ресурсы или блоги из которых нужны новости (bbc-news)
     * @param     'q' => '',              Ключевое слово или фраза
     * @param     'pageSize' => 20,       Сколько результатов нужно показывать на одной странице
     * @param     'page' => 1,            Какая страница показывается по умолчанию
     * ]
     * 
     * @param array $params
     * @return array
     */
    public function topHeadlines(array $params): array
    {
        $params['apiKey'] = config('newsAPI.api_key');
        $response = Http::get(
            config('newsAPI.headlines_url'),
            $params
        )->throw();
        return $response->json();
    }
}
