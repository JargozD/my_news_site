<?php

namespace App\Services\NewsApi;

use App\Services\NewsApi\NewsApiConnector;
use Exception;

/**
 * Класс включающий в себя три метода
 * 
 * @method __construct()                  Конструирует запрос перед отправкой в коннектор
 * @method search()                       Формирует запрос заполняя его данными, которые получает из полей ввода на странице news.blade.php 
 * @method getTopHeadlinesByCategory()    Формирует запрос для отправки новостей на главную страницу
 */
class NewsApiservice
{
    private const NETWORK_ERROR = 'Извините, сервис новостей не доступен. Попробуйте позже...';
    private const PAGE_SIZE_HOME_NEWS = 5;
    private const COUNTRY_HOME_NEWS = 'ru';

    private $connector = null;

    function __construct(NewsApiConnector $connector)
    {
        $this->connector = $connector;
    }

    /**
     * Здесь формируется запрос на основе данных, полученных со страницы news.blade.php
     */
    function search(string $query = null, string $from = null, string $to = null, string $language = null, int $pageSize = 10, int $page = 1): array
    {
        if (empty($query)) {
            return ['error' => 'Пожалуйста, введите запрос'];
        }

        $params = [
            'q' => $query,
            'pageSize' => $pageSize,
            'page' => $page,
        ];

        if (!empty($from)) {
            $params['from'] = $from;
        }

        if (!empty($to)) {
            $params['to'] = $to;
        }

        if (!empty($language)) {
            $params['language'] = $language;
        }


        try {
            $newsData = $this->connector->everything($params);
            if ($newsData['status'] == 'ok') {
                $pageCount = intdiv($newsData['totalResults'], $pageSize);
                if ($newsData['totalResults'] % $pageSize != 0) {
                    $pageCount += 1;
                }
                $newsData['pageCount'] = $pageCount;
            }
            return $newsData;
        } catch (Exception $e) {
            return [
                'error' => self::NETWORK_ERROR
            ];
        }
    }

    /**
     * Здесь формируется запрос горячих новостей по категориям, которые впоследствии будут отображаться на главной странице.
     */
    function getTopHeadlinesByCategory(string $category)
    {
        $params = [
            'category' => $category,
            'country' => self::COUNTRY_HOME_NEWS,
            'pageSize' => self::PAGE_SIZE_HOME_NEWS
        ];

        try {
            return $this->connector->topHeadlines($params);
        } catch (Exception $e) {
            return [
                'error' => self::NETWORK_ERROR
            ];
        }
    }
}
