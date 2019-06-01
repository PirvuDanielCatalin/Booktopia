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
        <form method="post" action="{{ route('shop.filters') }}">
            @csrf
            <div class="filter-title">
                @lang('dictionary.general.filters-panel')
            </div>
            <div class="filter-title apply-filters-div">
                <button type="submit"
                        class="btn btn-block btn-outline-secondary apply-filters-btn">
                    @lang('dictionary.general.apply-filters') <i class="fas fa-filter"></i>
                </button>
            </div>
            <div class="filter-panel price-filters-panel">
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
                            <input type="checkbox" name="price_filters_panel[]"
                                    {!!  (isset($price_filters) && in_array("< 30", $price_filters))
                                    ? "value='< 30' checked"
                                    : "value='< 30'" !!}
                            >
                            < 30 @lang('dictionary.general.currency')
                        </label>
                    </div>
                    <div class="filter-panel-item">
                        <label>
                            <input type="checkbox" name="price_filters_panel[]"
                                    {!! (isset($price_filters) && in_array("BETWEEN 30 AND 60", $price_filters))
                                     ? 'value="BETWEEN 30 AND 60" checked'
                                     : 'value="BETWEEN 30 AND 60"' !!}
                            >
                            30 - 60 @lang('dictionary.general.currency')
                        </label>
                    </div>
                    <div class="filter-panel-item">
                        <label>
                            <input type="checkbox" name="price_filters_panel[]"
                                    {!! (isset($price_filters) && in_array("BETWEEN 60 AND 100", $price_filters))
                                     ? 'value="BETWEEN 60 AND 100" checked'
                                     : 'value="BETWEEN 60 AND 100"' !!}
                            >
                            60 - 100 @lang('dictionary.general.currency')
                        </label>
                    </div>
                    <div class="filter-panel-item">
                        <label>
                            <input type="checkbox" name="price_filters_panel[]"
                                    {!! (isset($price_filters) && in_array("> 100", $price_filters))
                                    ? 'value="> 100" checked'
                                    : 'value="> 100"' !!}
                            >
                            > 100 @lang('dictionary.general.currency')
                        </label>
                    </div>
                </div>
            </div>
            <div class="filter-panel category-filters-panel">
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
                                <input type="checkbox" name="category_filters_panel[]"
                                        {!! (isset($category_filters) && in_array($category->name, $category_filters))
                                        ? 'value="'.$category->name.'" checked'
                                        : 'value="'.$category->name.'"' !!}
                                >
                                {{ $category->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-10 card flex-row flex-wrap">
        @if(sizeof($books))
            @if(sizeof($books) >= 8)
                <div class="w-100 pt-3 h-auto">
                    <div class="float-right">
                        @if(isset($price_filters) || isset($category_filters))
                            {{ $books
                            ->appends(['price_filters_panel' => $price_filters, 'category_filters_panel' => $category_filters])
                            ->links() }}
                        @else
                            {{ $books->links() }}
                        @endif
                    </div>
                </div>
            @endif
            <div class="m-auto w-100 row books-panel">
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
                            <div class="book-new-price">
                                {{ $book->price }} @lang('dictionary.general.currency')
                            </div>
                            {{--                        <div class="book-new-price">--}}
                            {{--                            {{ $book->price-10/100*$book->price }} @lang('dictionary.general.currency')--}}
                            {{--                        </div>--}}
                        </div>

                        <a href="{{ route('books.show', $book) }}" class="book-details-btn">
                            <button class="btn btn-outline-info btn-block">
                                @lang('dictionary.book.actions.see-details')
                            </button>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="col-md-12 p-5">
                <h3>
                    <b>
                        <i class="far fa-frown"></i> @lang('dictionary.general.we-are-sorry')<br>
                        @lang('dictionary.general.no-product-on-search-criteria')
                    </b>
                </h3>
            </div>
        @endif
    </div>
@endsection
