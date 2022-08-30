@if(isset($newsDatas))
<hr>
<h3 class="text-center">{{$header}}</h3>
<hr>


<div class="row row-cols-1 row-cols-md-5 g-4">
    @foreach ($newsDatas['articles'] as $newsCard)
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