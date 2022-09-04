<nav>
    <ul class="pagination justify-content-center">
        <li class="page-item pages__item" value="1">
            <div class="page-link">First</div>
        </li>
        @if(old('page') > 1)
        <li class="page-item pages__item" value="{{old('page') - 1}}">
            <div class="page-link"><<</div>
        </li>
        @endif
        @for ($pageNumber = old('page'); $pageNumber <= old('page') + 5; $pageNumber++) 
            <li class="page-item pages__item" name="page" id="page" value="{{$pageNumber}}">
            <div class="page-link">{{$pageNumber}}</div>
            </li>
        @endfor
        <li class="page-item pages__item" value="{{old('page') + 1}}">
            <div class="page-link">>></div>
        </li>
        <li class="page-item pages__item" value="{{$newsData['pageCount']}}">
            <div class="page-link">Last</div>
        </li>
    </ul>
</nav>