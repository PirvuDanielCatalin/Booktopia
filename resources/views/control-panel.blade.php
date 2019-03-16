@extends('layouts.app')

@section('scripts')
    <script src="{{ asset('js/control-panel.js') }}" defer></script>
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/control-panel.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a class="card panel" href="{{ route('users.index') }}">
                            <i class="fas fa-3x fa-users"></i><br>@lang('dictionary.control-panel.users')
                        </a>
                        <a class="card panel" href="{{ route('books.index') }}">
                            <i class="fas fa-3x fa-book"></i><br>@lang('dictionary.control-panel.books')
                        </a>
                        <a class="card panel" href="{{ route('categories.index') }}">
                            <i class="fab fa-3x fa-elementor"></i><br>@lang('dictionary.control-panel.categories')
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection