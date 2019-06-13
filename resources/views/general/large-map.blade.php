@extends('general.shop')

@section('shop-scripts')
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" defer></script>
    <script type="text/javascript"
            src="{{ asset('js/general/large-map.js') }}" defer></script>
@endsection

@section('shop-styles')
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
    <style>
        .leaflet-large-map {
            width: 100%;
            height: 500px;
        }
    </style>
@endsection

@section('scontent')
    <button class="btn btn-outline-info btn-block m-1"
            id="find-closest-shop">
        @lang('dictionary.general.find-the-closest-shop')
    </button>
    <div class="col-md-12 leaflet-large-map" id="leaflet-large-map">

    </div>
@endsection