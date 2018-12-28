@extends('shop')

@section('shop-scripts')
    <script src="{{ asset('js/shop-products.js') }}" defer></script>
@endsection

@section('shop-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/shop-products.css') }}">
@endsection

@section('books-content')
    @foreach($books as $book)
        <div class="col-md-2 card book-div">
            <div class="book-title"><b>{{ $book->title }}</b></div>
            <div class="book-thumbnail-div">
                <img src="{{ public_path('images/' . $book->photo) }}" alt="CoverPhoto" class="book-thumbnail-img">
            </div>
            <div class="book-price"><b>@lang('dictionary.book.price'):</b> {{ $book->price }} lei</div>
            <a href="{{ route('books.show', $book) }}" class="book-details-btn">
                <button class="btn btn-outline-info btn-block">
                    @lang('dictionary.book.actions.see-details')
                </button>
            </a>
        </div>
    @endforeach
    <div class="col-md-12" style="height: 30px">
        <div class="float-right">
            {{ $books->links() }}
        </div>
    </div>
@endsection
