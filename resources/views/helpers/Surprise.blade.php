@extends('layouts.app')

@section('scripts')
@endsection

@section('styles')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center">
                            <iframe src="https://giphy.com/embed/4JZA2x7GsVFeTbLKlz"
                                    width="480"
                                    height="331"
                                    frameBorder="0"
                                    class="giphy-embed"
                                    allowFullScreen>
                            </iframe>
                        </h1>
                    </div>
                    <div class="shop-footer text-center ml-4 mr-4 mb-4">
                        <div>
                            Admin Account<br>
                            User: <b>daniel.catalin.pirvu@gmail.com</b><br>
                            Password: <b>booktopia123</b>
                        </div>
                        <br>
                        <a class="btn btn-outline-secondary w-50"
                           href="{{ route('shop', ['alt' => 1 ]) }}"
                           role="button">
                            @lang('dictionary.general.shopping-cart.go-to-shop')
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
