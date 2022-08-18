<?php

namespace App\Services\NewsApi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsApiConnector
{
    /**
     * Поиск по всем параметрам.
     * Список возожных передаваемых параметров (Для всех параметров, перечисляемые значения задаются через запятую):
     * [
     *      'q' => '',              Ключевое слово запроса
     *      'searchIn' => '',       Поиск в заголовке\описании\тексте (title description content)
     *      'sources' => '',        Из ресурсов какой страны
     *      'domains' => '',        Адрес сайта с которого нужно получить новости (можно несколько)
     *      'excludeDomains' => '', Адрес сайта с которого НЕнужно получить новости (можно несколько)
     *      'from' => '',           С какой даты показывать новости
     *      'to' => '',             До какой даты показывать новости
     *      'language' => '',       На каком языке нужно получать новости (ar de en es fr he it nl no pt ru sv ud zh)
     *      'sortBy' => '',         Сортировка новостей по: (relevancy, popularity, publishedAt)
     *      'pageSize' => 20,       Сколько результатов нужно показывать на одной странице
     *      'page' => 1,            Какая страница показывается по умолчанию
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
     *      'country' => '',        Страна из которой хотите получить главные новости (ae ar at au be bg br ca ch cn co cu cz de eg fr gb gr hk hu id ie il in it jp kr lt lv ma mx my ng nl no nz ph pl pt ro rs ru sa se sg si sk th tr tw ua us ve za)
     *      'category' => '',       Категория по которой нужны новости (business entertainment general health science sports technology)
     *      'sources' => '',        Здесь указываются новостные ресурсы или блоги из которых нужны новости (bbc-news)
     *      'q' => '',              Ключевое слово или фраза
     *      'pageSize' => 20,       Сколько результатов нужно показывать на одной странице
     *      'page' => 1,            Какая страница показывается по умолчанию
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
