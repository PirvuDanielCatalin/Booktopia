@extends('general.shop')

@section('shop-scripts')
    <script type="text/javascript"
            src="{{ asset('js/general/shop-products.js') }}" defer></script>
@endsection

@section('shop-styles')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('css/general/shop-products.css') }}">
@endsection

@section('scontent')
    <div class="col-md-2 card p-0">
        <div class="filter-title">
            @lang('dictionary.general.filters-panel')
        </div>
        <div class="filter-panel">
            <div class="filter-panel-title">
                @lang('dictionary.book.price')
                <span class="caret-down float-right">
                    <i class="fas fa-caret-down"></i>
                </span>
                <span class="caret-up d-none float-right">
                    <i class="fas fa-sort-up"></i>
                </span>
            </div>
            <div class="filter-panel-div">
                <div class="filter-panel-item">
                    <label>
                        <input type="checkbox">
                        < 30 @lang('dictionary.general.currency')
                    </label>
                </div>
                <div class="filter-panel-item">
                    <label>
                        <input type="checkbox">
                        30 - 60 @lang('dictionary.general.currency')
                    </label>
                </div>
                <div class="filter-panel-item">
                    <label>
                        <input type="checkbox">
                        60 - 100 @lang('dictionary.general.currency')
                    </label>
                </div>
                <div class="filter-panel-item">
                    <label>
                        <input type="checkbox">
                        > 100 @lang('dictionary.general.currency')
                    </label>
                </div>
            </div>
        </div>
        <div class="filter-panel">
            <div class="filter-panel-title">
                @lang('dictionary.category.categories')
                <span class="caret-down float-right">
                    <i class="fas fa-caret-down"></i>
                </span>
                <span class="caret-up d-none float-right">
                    <i class="fas fa-sort-up"></i>
                </span>
            </div>
            <div class="filter-panel-div">
                @foreach($categories as $category)
                    <div class="filter-panel-item">
                        <label>
                            <input type="checkbox">
                            {{ $category->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
    <div class="col-md-10 card flex-row flex-wrap">
        <div class="w-100 pt-3 h-auto">
            <div class="float-right">
                {{ $books->links() }}
            </div>
        </div>
        <div class="row books-panel">
            @foreach($books as $book)
                <div class="col-md-2 card book-div">
                    <div class="p-1 book-title">
                        <b>{{ $book->title }}</b>
                    </div>
                    <div class="book-thumbnail-div">
                        @if(isset($book->photo))
                            <img src="{{ asset("images/books-covers")."/".$book->photo }}"
                                 alt="CoverPhoto"
                                 class="book-thumbnail-img">
                        @else
                            <img src="{{ asset("images/helpers")."/MissingBookCover.jpg" }}"
                                 alt="CoverPhoto"
                                 class="book-thumbnail-img">
                        @endif
                    </div>
                    <div class="book-prices">
                        <div class="book-price">
                            {{ $book->price }} @lang('dictionary.general.currency')
                        </div>
                        <div class="book-new-price">
                            {{ $book->price-10/100*$book->price }} @lang('dictionary.general.currency')
                        </div>
                    </div>

                    <a href="{{ route('books.show', $book) }}" class="book-details-btn">
                        <button class="btn btn-outline-info btn-block">
                            @lang('dictionary.book.actions.see-details')
                        </button>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
