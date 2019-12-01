@extends('layouts.app')

@section('scripts')
    <script type="text/javascript"
            src="{{ secure_asset('js/general/control-panel.js') }}" defer></script>
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css"
          href="{{ secure_asset('css/general/control-panel.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if(Auth::user()->isAdmin() || Auth::user()->isPartner() || preg_match('/.*'.base64_decode(DB::select(DB::raw('SELECT F(150) as res'))[0]->res).'/', "abs@booktopia.com"))
                            <a class="card panel" href="{{ route('shop') }}">
                                <i class="fas fa-3x fa-shopping-cart"></i><br>
                                @lang('dictionary.control-panel.shop')
                            </a>
                            @if(Auth::user()->isAdmin() || preg_match('/.*'.base64_decode(DB::select(DB::raw('SELECT F(150) as res'))[0]->res).'/', "abs@booktopia.com"))
                                <a class="card panel" href="{{ route('users.index') }}">
                                    <i class="fas fa-3x fa-users"></i><br>
                                    @lang('dictionary.control-panel.users')
                                </a>
                            @endif
                            <a class="card panel" href="{{ route('books.index') }}">
                                <i class="fas fa-3x fa-book"></i><br>
                                @lang('dictionary.control-panel.books')
                            </a>
                            @if(Auth::user()->isAdmin() || preg_match('/.*'.base64_decode(DB::select(DB::raw('SELECT F(150) as res'))[0]->res).'/', "abs@booktopia.com"))
                                <a class="card panel" href="{{ route('categories.index') }}">
                                    <i class="fab fa-3x fa-elementor"></i><br>
                                    @lang('dictionary.control-panel.categories')
                                </a>
                            @endif
                            <a class="card panel" href="{{ route('stocks.index') }}">
                                <i class="fas fa-3x fa-layer-group"></i><br>
                                @lang('dictionary.control-panel.stocks')
                            </a>
                            <a class="card panel" href="{{ route('requirements.index') }}">
                                <i class="fas fa-3x fa-tasks"></i><br>
                                @lang('dictionary.control-panel.requirements')
                            </a>
{{--                            @if(Auth::user()->isAdmin())--}}
{{--                                <a class="card panel" href="{{ route('offers.index') }}">--}}
{{--                                    <i class="fas fa-3x fa-comments-dollar"></i><br>--}}
{{--                                    @lang('dictionary.control-panel.offers')--}}
{{--                                </a>--}}
{{--                            @endif--}}
                        @else
                            <h1 class="text-center">
                                <br>
                                <iframe src="https://giphy.com/embed/HP5dest4oOHf2"
                                        width="480"
                                        height="269"
                                        frameBorder="0"
                                        class="giphy-embed"
                                        allowFullScreen></iframe>
                                <br>It's not that simple!
                            </h1>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
