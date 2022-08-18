<?php

namespace App\Services\NewsApi;

use App\Services\NewsApi\NewsApiConnector;

class NewsApiservice
{
    private $connector = null;

    function __construct(NewsApiConnector $connector)
    {
        $this->connector = $connector;
    }

    function search(string $query, $from, $to)
    {
        $params = [
            'q' => $query,
            'from' => $from,
            'to' => $to,
            'pageSize' => 15
        ];

        // var_dump($params);
        // exit();

        return $this->connector->everything($params);
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
