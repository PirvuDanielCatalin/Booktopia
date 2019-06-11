@extends('general.shop')

@section('shop-scripts')
    <script type="text/javascript"
            src="https://www.google.com/books/jsapi.js" defer></script>
    <script type="text/javascript"
            src="{{ asset('js/books/show-sample.js') }}" defer></script>
@endsection

@section('shop-styles')
    <style>
        #bookViewer {
            height: 500px;
        }
    </style>
@endsection

@section('scontent')
    <input type="hidden" name="isbn" value="{{ $isbn }}">
    <div class="col-md-12 " id="bookViewer">

    </div>
@endsection