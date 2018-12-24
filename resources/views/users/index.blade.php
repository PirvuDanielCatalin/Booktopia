@extends('layouts.app')

@section('scripts')
    <script src="{{ asset('js/users/index.js') }}" defer></script>
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/users/index.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection