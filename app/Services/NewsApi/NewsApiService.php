<?php

namespace App\Services\NewsApi;

use App\Services\NewsApi\NewsApiConnector;
use Exception;

class NewsApiservice
{
    private $connector = null;

    function __construct(NewsApiConnector $connector)
    {
        $this->connector = $connector;
    }

    function search(string $query = null, string $from = null, string $to = null, int $pageSize = 10, int $page = 1) : array
    {
        if (empty($query)){
            return ['error' => 'Пожалуйста, введите запрос'];
        }

        $params = [
            'q' => $query,
            'pageSize' => $pageSize,
            'page' => $page
        ];

        if (!empty($from)){
            $params['from'] = $from;
        }

        if (!empty($to)){
            $params['to'] = $to;
        }

        try {
            return $this->connector->everything($params);
        } catch (Exception $e) {
            return [
                'error' => 'Извините, сервис новостей не доступен. Попробуйте позже...'
            ];
        }
    }
    /******************************************************************** Новости для главной страницы **************************************************************/

    /***************************** Бизнес **************************/

    function mainPageNewsBusiness()
    {
        $params = [
            'country' => 'ru',
            'category' => 'business',
            'pageSize' => 5
        ];

        // var_dump($params);
        // exit();

        return $this->connector->topHeadlines($params);
    }


    /***************************** Развлечения **************************/

    function mainPageNewsEntertainment()
    {
        $params = [
            'country' => 'ru',
            'category' => 'entertainment',
            'pageSize' => 5
        ];

        // var_dump($params);
        // exit();

        return $this->connector->topHeadlines($params);
    }


    /***************************** Главные **************************/

    function mainPageNewsGeneral()
    {
        $params = [
            'country' => 'ru',
            'category' => 'general',
            'pageSize' => 5
        ];

        // var_dump($params);
        // exit();

        return $this->connector->topHeadlines($params);
    }


    /***************************** Здоровье **************************/

    function mainPageNewsHealth()
    {
        $params = [
            'country' => 'ru',
            'category' => 'health',
            'pageSize' => 5
        ];

        // var_dump($params);
        // exit();

        return $this->connector->topHeadlines($params);
    }


    /***************************** Наука **************************/

    function mainPageNewsScience()
    {
        $params = [
            'country' => 'ru',
            'category' => 'science',
            'pageSize' => 5
        ];

        // var_dump($params);
        // exit();

        return $this->connector->topHeadlines($params);
    }


    /***************************** Спорт **************************/

    function mainPageNewsSports()
    {
        $params = [
            'country' => 'ru',
            'category' => 'sports',
            'pageSize' => 5
        ];

        // var_dump($params);
        // exit();

        return $this->connector->topHeadlines($params);
    }


    /***************************** Технологии **************************/

    function mainPageNewsTechnology()
    {
        $params = [
            'country' => 'ru',
            'category' => 'technology',
            'pageSize' => 5
        ];

        // var_dump($params);
        // exit();

        return $this->connector->topHeadlines($params);
    }
}
