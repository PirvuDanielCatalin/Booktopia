@extends('layouts.app')

@section('scripts')
    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" defer></script>
    <script src="{{ asset('js/shop.js') }}" defer></script>
    @yield('shop-scripts')
@endsection

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"/>
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
    @yield('shop-styles')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header row search-bar">
                        <div class="text-left col-md-4">
                            <div class="input-group search-bar-div">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="text-right col-md-8">
                            <div class="shopping-cart-div">
                                <div class="shopping-cart-products-nr"></div>
                                <i class="fas fa-shopping-cart"></i>
                                <b>@lang('dictionary.general.shopping-cart')</b>
                            </div>

                        </div>
                    </div>
                    <div class="card-body row">
                        @yield('books-content')
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-4 row">
                                <div class="col-md-12 footer-info-div">
                                    <h5 class="d-inline"><b>Program:</b></h5>
                                </div>
                                <div class="col-md-12 footer-info-div">
                                    <h6>
                                        Monday - Saturday: &emsp;8:00 - 18:00<br>
                                        Sunday: &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Closed
                                    </h6>
                                </div>
                                <div class="col-md-12 footer-info-div">
                                    <h5 class="d-inline"><b>Email:</b></h5>
                                </div>
                                <div class="col-md-12 footer-info-div">
                                    <h6 class="d-inline">booktopia.contact@gmail.com</h6>
                                </div>
                            </div>
                            <div class="col-md-4 leaflet-map-div">
                                <!-- Leaflet Maps -->
                                <div id="leaflet-map"></div>
                            <!-- <img src="{{ public_path('images/LogoBooktopia.png') }}"> -->
                            </div>
                            <div class="row col-md-4">
                                <form class="row" action="{{ route('contact-email') }}" method="post">
                                    @csrf
                                    <div class="col-md-6">
                                        <label for="subject">Subject</label>
                                        <input name="subject" type="text" class="form-control" required
                                               placeholder="Ex: Webpage Bug">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email">Email</label>
                                        <input name="email" type="text" class="form-control" required
                                               pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" placeholder="Ex: name@domain.com">
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <label for="text">Text</label>
                                        <textarea name="text" class="form-control" rows="2" required minlength="10"
                                                  maxlength="2000"></textarea>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <input type="submit" class="btn btn-success btn-block" value="Send Email">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection