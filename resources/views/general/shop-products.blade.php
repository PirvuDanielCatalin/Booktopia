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
                Ceva
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
                        <input type="checkbox" class="form-control d-inline">
                        ceva
                    </label>
                </div>
                <div class="filter-panel-item">
                    <label>
                        <input type="checkbox" class="form-control d-inline">
                        ceva
                    </label>
                </div>
            </div>
        </div>
        <div class="filter-panel">
            <div class="filter-panel-title">
                Ceva
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
                        ceva
                    </label>
                </div>
                <div class="filter-panel-item">
                    <label>
                        <input type="checkbox">
                        ceva
                    </label>
                </div>
            </div>
        </div>
        <div class="filter-panel">
            <div class="filter-panel-title">
                Ceva
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
                        ceva
                    </label>
                </div>
                <div class="filter-panel-item">
                    <label>
                        <input type="checkbox">
                        ceva
                    </label>
                </div>
            </div>
        </div>
        <div class="filter-panel">
            <div class="filter-panel-title">
                Ceva
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
                        ceva
                    </label>
                </div>
                <div class="filter-panel-item">
                    <label>
                        <input type="checkbox">
                        ceva
                    </label>
                </div>
            </div>
        </div>
        <div class="filter-panel">
            <div class="filter-panel-title">
                Ceva
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
                        ceva
                    </label>
                </div>
                <div class="filter-panel-item">
                    <label>
                        <input type="checkbox">
                        ceva
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-10 card flex-row flex-wrap justify-content-center">
        @for($i = 1 ;$i <=10;$i++)
            @foreach($books as $book)
                <div class="col-md-2 card book-div">
                    <div class="p-1 book-title">
                        <b>{{ $book->title }}</b>
                    </div>
                    <div class="book-thumbnail-div">
                        <img src="{{ asset("images/books-covers")."/".$book->photo }}"
                             alt="CoverPhoto"
                             class="book-thumbnail-img">
                    </div>
                    <div class="book-price">
                        {{--<b>@lang('dictionary.book.price'):</b>--}} {{ $book->price }} @lang('dictionary.general.currency')
                    </div>
                    <div class="book-new-price">
                        {{--<b>@lang('dictionary.book.price'):</b>--}} {{ $book->price }} @lang('dictionary.general.currency')
                    </div>
                    <a href="{{ route('books.show', $book) }}" class="book-details-btn">
                        <button class="btn btn-outline-info btn-block">
                            @lang('dictionary.book.actions.see-details')
                        </button>
                    </a>
                </div>
            @endforeach
        @endfor
        <div class="col-md-12" style="height: 30px">
            <div class="float-right">
                {{ $books->links() }}
            </div>
        </div>
    </div>
@endsection
