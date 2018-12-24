@extends('layouts.app')

@section('scripts')

@endsection

@section('styles')
    <!-- link rel="stylesheet" type="text/css" href="{{ asset('css/books/create.css') }}" -->
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-right">
                        <i class="fas fa-shopping-cart"></i>
                        @lang('dictionary.general.shopping-cart')
                    </div>
                    <div class="card-body">
                        <!-- Lista carti -->
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-4 row">
                                <div class="col-md-12">
                                    <h2><b>Name:</b></h2>
                                </div>
                                <div class="col-md-12">
                                    <h4>{{ config('app.name', 'Booktopia') }}</h4>
                                </div>
                                <div class="col-md-12">
                                    <h2><b>Email:</b></h2>
                                </div>
                                <div class="col-md-12">
                                    <h4>booktopia.contact@gmail.com</h4>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <img src="{{ public_path('images/LogoBooktopia.png') }}">
                            </div>
                            <div class="row col-md-4">
                                <form class="row" action="{{ route('contact-email') }}" method="post">
                                    @csrf
                                    <div class="col-md-6">
                                        <label for="subject">Subject</label>
                                        <input name="subject" type="text" class="form-control" required value="Contact Email">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email">Email</label>
                                        <input name="email" type="text" class="form-control" required
                                               pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" value="danut_pirvu2008@yahoo.com">
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <label for="text">Text</label>
                                        <textarea name="text" class="form-control" rows="2" required maxlength="2000">Test Email</textarea>
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