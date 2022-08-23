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
    public function search(Request $req, NewsApiService $newsApiService)
    {
        $response = $newsApiService->search(
            $req->input('q'),
            $req->input('from'),
            $req->input('to'),
            $req->input('pageSize'),
            $req->input('page')
        );

        // return view('news', compact('response'));
        $req->flash();
        return view('news')->with(['newsData' => $response]);
        //dd($response);
    }

    public function mainPageNews(NewsApiService $newsApiService)
    {
        $responseBusiness = $newsApiService->mainPageNewsBusiness();
        $responseEntertainment = $newsApiService->mainPageNewsEntertainment();
        $responseGeneral = $newsApiService->mainPageNewsGeneral();
        $responseHealth = $newsApiService->mainPageNewsHealth();
        $responseScience = $newsApiService->mainPageNewsScience();
        $responseSports = $newsApiService->mainPageNewsSports();
        $responseTechnology = $newsApiService->mainPageNewsTechnology();

        // return view('news', compact('response'));
        return view('home')
        ->with(['newsDataBusiness' => $responseBusiness])
        ->with(['newsDataEntertainment' => $responseEntertainment])
        ->with(['newsDataGeneral' => $responseGeneral])
        ->with(['newsDataHealth' => $responseHealth])
        ->with(['newsDataScience' => $responseScience])
        ->with(['newsDataSports' => $responseSports])
        ->with(['newsDataTechnology' => $responseTechnology]);
        //dd($response);
    }

}
