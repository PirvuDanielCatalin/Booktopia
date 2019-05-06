@extends('layouts.app')

@section('scripts')
    <script type="text/javascript"
            src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" defer></script>
    <script type="text/javascript"
            src="{{ asset('js/general/shop.js') }}" defer></script>
    @yield('shop-scripts')
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css"
          href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('css/general/shop.css') }}">
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
                                <input type="text"
                                       class="form-control"
                                       placeholder="Search">
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
                        @yield('scontent')
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-4 row">
                                <div class="col-md-12 footer-info-div">
                                    <h5 class="d-inline">
                                        <b>@lang('dictionary.general.footer.program')</b>
                                    </h5>
                                </div>
                                <div class="col-md-12 footer-info-div">
                                    <h6>
                                        @lang('dictionary.general.footer.program-data')
                                    </h6>
                                </div>
                                <div class="col-md-12 footer-info-div">
                                    <h5 class="d-inline">
                                        <b>@lang('dictionary.general.footer.adress')</b>
                                    </h5>
                                </div>
                                <div class="col-md-12 footer-info-div">
                                    <h6 class="d-inline">
                                        @lang('dictionary.general.footer.adress-data')
                                    </h6>
                                </div>
                                <div class="col-md-12 footer-info-div">
                                    <h5 class="d-inline">
                                        <b>@lang('dictionary.general.footer.phone')</b>
                                    </h5>
                                </div>
                                <div class="col-md-12 footer-info-div">
                                    <h6 class="d-inline">
                                        @lang('dictionary.general.footer.phone-data')
                                    </h6>
                                </div>
                                <div class="col-md-12 footer-info-div">
                                    <h5 class="d-inline">
                                        <b>@lang('dictionary.general.footer.email')</b>
                                    </h5>
                                </div>
                                <div class="col-md-12 footer-info-div">
                                    <h6 class="d-inline">
                                        @lang('dictionary.general.footer.email-data')
                                    </h6>
                                </div>
                            </div>
                            <div class="col-md-4 leaflet-map-div">
                                <div id="leaflet-map" class="mt-2"></div>
                                <button data-toggle="modal"
                                        data-target="#findNearestShopModal"
                                        class="btn btn-info btn-block mt-2"
                                        id="find-the-nearest-shop-btn">
                                    <i class="fas fa-search-location"></i> @lang('dictionary.general.find-the-nearest-shop')
                                </button>
                                {{-- <img src="{{ asset("images")."/LogoBooktopia.png" }}">--}}
                            </div>
                            <div class="row col-md-4">
                                <form class="row" action="{{ route('contact-email') }}" method="post">
                                    @csrf
                                    <div class="col-md-6">
                                        <label for="subject">@lang('dictionary.general.footer.subject')</label>
                                        <input class="form-control"
                                               name="subject"
                                               placeholder="example"
                                               required
                                               type="text">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email">@lang('dictionary.general.footer.email')</label>
                                        <input class="form-control"
                                               name="email"
                                               pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}"
                                               placeholder="name@domain.com"
                                               required
                                               type="text">
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <label for="text">@lang('dictionary.general.footer.text')</label>
                                        <textarea class="form-control"
                                                  maxlength="2000"
                                                  minlength="10"
                                                  name="text"
                                                  required
                                                  rows="6"></textarea>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <button type="submit" class="btn btn-success btn-block">
                                            <i class="far fa-paper-plane"></i> @lang('dictionary.general.send-email')
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div aria-hidden="true"
         aria-labelledby="findNearestShopModalLabel"
         class="modal fade"
         id="findNearestShopModal"
         role="dialog"
         tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="findNearestShopModalLabel">
                        @lang('dictionary.general.find-the-nearest-shop')
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="leaflet-map-modal"></div>
                    <button class="btn btn-light btn-block">@lang('dictionary.actions.find')</button>
                </div>
            </div>
        </div>
    </div>
@endsection
