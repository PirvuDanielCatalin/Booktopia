@extends('layouts.app')

@section('scripts')

@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/books/create.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <b>Create new book</b>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('books.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 form-div">
                                    <label for="title">Title:</label>
                                    @if( $errors->has('title'))
                                        <p class="error-msg">{{ $errors->first('title') }}</p>
                                    @endif
                                    <input type="text" name="title"
                                           class="form-control {{ ($errors->has('title')) ? 'form-input' : '' }}">
                                </div>
                                <div class="col-md-12 form-div">
                                    <label for="author">Author:</label>
                                    @if( $errors->has('author'))
                                        <p class="error-msg">{{ $errors->first('author') }}</p>
                                    @endif
                                    <input type="text" name="author"
                                           class="form-control {{ ($errors->has('author')) ? 'form-input' : '' }}">
                                </div>
                                <div class="col-md-12 form-div">
                                    <label for="publishing_house">Publishing House:</label>
                                    @if( $errors->has('publishing_house'))
                                        <p class="error-msg">{{ $errors->first('publishing_house') }}</p>
                                    @endif
                                    <input type="text" name="publishing_house"
                                           class="form-control {{ ($errors->has('publishing_house')) ? 'form-input' : '' }}">
                                </div>
                                <div class="col-md-12 form-div">
                                    <label for="description">Description:</label>
                                    @if( $errors->has('description'))
                                        <p class="error-msg">{{ $errors->first('description') }}</p>
                                    @endif
                                    <textarea name="description" rows="5"
                                              class="form-control {{ ($errors->has('description')) ? 'form-input' : '' }}">123456789012345678901234567890</textarea>
                                </div>
                                <div class="col-md-12 form-div">
                                    <label for="photo">Photo:</label>
                                    @if( $errors->has('photo'))
                                        <p class="error-msg">{{ $errors->first('photo') }}</p>
                                    @endif
                                    <input type="file" name="photo"
                                           class="form-control {{ ($errors->has('photo')) ? 'form-input' : '' }}">
                                </div>
                                <div class="col-md-12 form-div">
                                    <label for="price">Price:</label>
                                    @if( $errors->has('price'))
                                        <p class="error-msg">{{ $errors->first('price') }}</p>
                                    @endif
                                    <input type="number" name="price" step="0.01"
                                           class="form-control {{ ($errors->has('price')) ? 'form-input' : '' }}">
                                </div>
                                <div class="col-md-12 form-div">
                                    <input type="submit" class="btn btn-success btn-block">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection