@extends('layouts.app')

@section('scripts')
    <script type="text/javascript"
            src="{{ secure_asset('js/profiles/show.js') }}" defer></script>
@endsection

@section('styles')
    <style>
        .shop-footer {
            color: {{ session('number') }};
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center">
                            <br>
                            <iframe src="https://giphy.com/embed/4JZA2x7GsVFeTbLKlz"
                                    width="480"
                                    height="331"
                                    frameBorder="0"
                                    class="giphy-embed"
                                    allowFullScreen>
                            </iframe>
                        </h1>
                    </div>
                    <div class="shop-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
