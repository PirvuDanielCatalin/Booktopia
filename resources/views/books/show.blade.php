@extends('shop')

@section('shop-scripts')
    <script src="{{ asset('js/books/show.js') }}" defer></script>
@endsection

@section('shop-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/books/show.css') }}">
@endsection

@section('books-content')
    <div class="col-md-4 card">
        <div class="book-image-div card">
            <!-- Book Cover -->
            <img src="{{ asset("images")."/".$book->photo }}" alt="CoverPhoto" class="book-image">
        </div>
        <div class="rating-bar-div card text-center">
            <!-- Rating -->
            <span class="star" name="1">☆</span>
            <span class="star" name="2">☆</span>
            <span class="star" name="3">☆</span>
            <span class="star" name="4">☆</span>
            <span class="star" name="5">☆</span>
        </div>
    </div>
    <div class="col-md-8 card">
        <!-- Book Info -->
        <div class="book-info book-title">
            <b>{{ $book->title }}</b>
        </div>
        <div class="book-info">
            <b>{{ $book->author }}</b>
        </div>
        <div class="book-info">
            <b>@lang('dictionary.book.publishing_house'):</b>&nbsp;{{ $book->publishing_house }}
        </div>
        <div class="book-info">
            <b>@lang('dictionary.book.description'):</b><br>{{ $book->description }}
        </div>
        <div class="book-info">
            <b>@lang('dictionary.book.price'):</b>&nbsp;{{ $book->price }}
        </div>
        <div class="add-product-div">
            <input type="button" class="btn btn-outline-secondary add-product-btn" book-id="{{ $book->id }}"
                   value="@lang('dictionary.book.actions.add-to-cart')">
        </div>
    </div>
    <div class="col-md-12"><!-- Comments --></div>
@endsection
