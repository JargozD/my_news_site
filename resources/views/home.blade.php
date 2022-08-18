@extends('layouts')

@section('main_content')

<!---------------------------------------------------------- Главные Новости ---------------------------------------------------------->
@if(isset($newsDataGeneral))
<!-- <?php var_dump($newsDataGeneral); ?> -->
<hr>
<h3 class="text-center">Главные Новости</h3>
<hr>


<div class="row row-cols-1 row-cols-md-5 g-4">
    @foreach ($newsDataGeneral['articles'] as $newsCard)
    <div class="col" style="background-color:#343a40">
        <div class="card" >
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

@endif



<!---------------------------------------------------------- Новости Бизнеса ---------------------------------------------------------->
@if(isset($newsDataBusiness))
<!-- <?php var_dump($newsDataBusiness); ?> -->
<hr>
<h3 class="text-center">Новости Бизнеса</h3>
<hr>


<div class="row row-cols-1 row-cols-md-5 g-4">
    @foreach ($newsDataBusiness['articles'] as $newsCard)
    <div class="col" style="background-color:#343a40">
        <div class="card" >
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

@endif


<!---------------------------------------------------------- Новости Развлечений ---------------------------------------------------------->
@if(isset($newsDataEntertainment))
<!-- <?php var_dump($newsDataEntertainment); ?> -->
<hr>
<h3 class="text-center">Новости Развлечений</h3>
<hr>


<div class="row row-cols-1 row-cols-md-5 g-4">
    @foreach ($newsDataEntertainment['articles'] as $newsCard)
    <div class="col" style="background-color:#343a40">
        <div class="card" >
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

@endif


<!---------------------------------------------------------- Новости Здоровья ---------------------------------------------------------->
@if(isset($newsDataHealth))
<!-- <?php var_dump($newsDataHealth); ?> -->
<hr>
<h3 class="text-center">Новости Здоровья</h3>
<hr>


<div class="row row-cols-1 row-cols-md-5 g-4">
    @foreach ($newsDataHealth['articles'] as $newsCard)
    <div class="col" style="background-color:#343a40">
        <div class="card" >
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

@endif


<!---------------------------------------------------------- Новости Науки ---------------------------------------------------------->
@if(isset($newsDataScience))
<!-- <?php var_dump($newsDataScience); ?> -->
<hr>
<h3 class="text-center">Новости Науки</h3>
<hr>


<div class="row row-cols-1 row-cols-md-5 g-4">
    @foreach ($newsDataScience['articles'] as $newsCard)
    <div class="col" style="background-color:#343a40">
        <div class="card" >
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

@endif


<!---------------------------------------------------------- Новости Спорта ---------------------------------------------------------->
@if(isset($newsDataSports))
<!-- <?php var_dump($newsDataSports); ?> -->
<hr>
<h3 class="text-center">Новости Спорта</h3>
<hr>


<div class="row row-cols-1 row-cols-md-5 g-4">
    @foreach ($newsDataSports['articles'] as $newsCard)
    <div class="col" style="background-color:#343a40">
        <div class="card" >
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

@endif


<!---------------------------------------------------------- Новости Технологий ---------------------------------------------------------->
@if(isset($newsDataTechnology))
<!-- <?php var_dump($newsDataTechnology); ?> -->
<hr>
<h3 class="text-center">Новости Технологий</h3>
<hr>


<div class="row row-cols-1 row-cols-md-5 g-4">
    @foreach ($newsDataTechnology['articles'] as $newsCard)
    <div class="col" style="background-color:#343a40">
        <div class="card" >
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

@endif

@endsection