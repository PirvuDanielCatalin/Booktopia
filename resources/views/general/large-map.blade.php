@extends('general.shop')

@section('shop-scripts')
    <script type="text/javascript"
            src="{{ asset('js/general/large-map.js') }}" defer></script>
@endsection

@section('shop-styles')
    <style>
        .leaflet-large-map {
            width: 100%;
            height: 500px;
        }
    </style>
@endsection

@section('scontent')
    <div class="col-md-12 leaflet-large-map" id="leaflet-large-map">

    </div>
@endsection