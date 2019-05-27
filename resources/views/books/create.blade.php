@extends('layouts.app')

@section('scripts')
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" defer></script>
    <script type="text/javascript"
            src="{{ asset('js/books/create_edit.js') }}" defer></script>
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('css/books/create_edit.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <b>@lang('dictionary.book.forms.create')</b>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('books.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card title_author_publiching_house_card">
                                <div class="card-header text-center">
                                    @lang('dictionary.book.title') && @lang('dictionary.book.author')
                                    && @lang('dictionary.book.publishing_house')
                                    <span class="caret-down d-none float-right">
                                        <i class="fas fa-caret-down fa-2x"></i>
                                    </span>
                                    <span class="caret-up float-right">
                                        <i class="fas fa-sort-up fa-2x"></i>
                                    </span>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12 m-2">
                                        <label for="title">@lang('dictionary.book.title')</label>
                                        <i class="fas fa-info-circle"
                                           data-placement="top"
                                           data-toggle="tooltip"
                                           title="@lang('dictionary.general.required-field')"></i>
                                        @if( $errors->has('title'))
                                            <p class="error-msg">{{ $errors->first('title') }}</p>
                                        @endif
                                        <input class="form-control {{ ($errors->has('title')) ? 'error-form-input' : '' }}"
                                               name="title"
                                               type="text"
                                               placeholder="@lang('dictionary.book.placeholders.title')">
                                    </div>
                                    <div class="col-md-12 m-2">
                                        <label for="author">@lang('dictionary.book.author')</label>
                                        <i class="fas fa-info-circle"
                                           data-placement="top"
                                           data-toggle="tooltip"
                                           title="@lang('dictionary.general.required-field')"></i>
                                        @if( $errors->has('author'))
                                            <p class="error-msg">{{ $errors->first('author') }}</p>
                                        @endif
                                        <input class="form-control {{ ($errors->has('author')) ? 'error-form-input' : '' }}"
                                               name="author"
                                               type="text"
                                               placeholder="@lang('dictionary.book.placeholders.author')">
                                    </div>
                                    <div class="col-md-12 m-2">
                                        <label for="publishing_house">@lang('dictionary.book.publishing_house')</label>
                                        <i class="fas fa-info-circle"
                                           data-placement="top"
                                           data-toggle="tooltip"
                                           title="@lang('dictionary.general.required-field')"></i>
                                        @if( $errors->has('publishing_house'))
                                            <p class="error-msg">{{ $errors->first('publishing_house') }}</p>
                                        @endif
                                        <input class="form-control {{ ($errors->has('publishing_house')) ? 'error-form-input' : '' }}"
                                               name="publishing_house"
                                               type="text"
                                               placeholder="@lang('dictionary.book.placeholders.publishing_house')">
                                    </div>
                                </div>
                            </div>
                            <div class="card description_photo_card">
                                <div class="card-header text-center">
                                    @lang('dictionary.book.description') && @lang('dictionary.book.photo')
                                    <span class="caret-down d-none float-right">
                                        <i class="fas fa-caret-down fa-2x"></i>
                                    </span>
                                    <span class="caret-up float-right">
                                        <i class="fas fa-sort-up fa-2x"></i>
                                    </span>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12 m-2">
                                        <label for="description">@lang('dictionary.book.description')</label>
                                        <i class="fas fa-info-circle"
                                           data-placement="top"
                                           data-toggle="tooltip"
                                           title="@lang('dictionary.book.tooltips.description')"></i>
                                        @if( $errors->has('description'))
                                            <p class="error-msg">{{ $errors->first('description') }}</p>
                                        @endif
                                        <textarea
                                                class="form-control {{ ($errors->has('description')) ? 'error-form-input' : '' }}"
                                                name="description"
                                                rows="10"
                                                placeholder="@lang('dictionary.book.placeholders.description')"></textarea>
                                    </div>
                                    <div class="col-md-12 m-2">
                                        <div>
                                            <label for="photo">@lang('dictionary.book.photo')</label>
                                            <i class="fas fa-info-circle"
                                               data-placement="top"
                                               data-toggle="tooltip"
                                               title="@lang('dictionary.book.tooltips.photo')"></i>
                                            @if( $errors->has('photo'))
                                                <p class="error-msg">{{ $errors->first('photo') }}</p>
                                            @endif
                                            <div class="image-dropzone">
                                                @if(isset($book->photo))
                                                    <img src="{{ asset("images/books-covers")."/".$book->photo }}">
                                                @else
                                                    <img src="{{ asset("images/helpers")."/MissingBookCover.jpg" }}">
                                                @endif
                                            </div>
                                            <div class="w-50 p-4">@lang('dictionary.book.drag-and-drop.first-part')</div>
                                            <input accept="image/*"
                                                   class="form-control w-50 {{ ($errors->has('photo')) ? 'error-form-input' : '' }}"
                                                   name="photo"
                                                   type="file">
                                            <div class="w-50 p-4">@lang('dictionary.book.drag-and-drop.second-part')</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card categories_card">
                                <div class="card-header text-center">
                                    @lang('dictionary.category.categories')
                                    <span class="caret-down d-none float-right">
                                        <i class="fas fa-caret-down fa-2x"></i>
                                    </span>
                                    <span class="caret-up float-right">
                                        <i class="fas fa-sort-up fa-2x"></i>
                                    </span>
                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        <ul class="ks-cboxtags">
                                            @foreach($categories as $category)
                                                <li>
                                                    <input id="checkbox{{ $category->id }}"
                                                           name="categories[]"
                                                           type="checkbox"
                                                           value="{{ $category->name }}">
                                                    <label for="checkbox{{ $category->id }}">{{ $category->name }}</label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card price_card">
                                <div class="card-header text-center">
                                    @lang('dictionary.book.price')
                                    <span class="caret-down d-none float-right">
                                        <i class="fas fa-caret-down fa-2x"></i>
                                    </span>
                                    <span class="caret-up float-right">
                                        <i class="fas fa-sort-up fa-2x"></i>
                                    </span>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12 m-2">
                                        <label for="price">@lang('dictionary.book.price')</label>
                                        <i class="fas fa-info-circle"
                                           data-placement="top"
                                           data-toggle="tooltip"
                                           title="@lang('dictionary.general.required-field')"></i>
                                        @if( $errors->has('price'))
                                            <p class="error-msg">{{ $errors->first('price') }}</p>
                                        @endif
                                        <input class="form-control {{ ($errors->has('price')) ? 'error-form-input' : '' }}"
                                               min="1"
                                               name="price"
                                               step="0.01"
                                               type="number"
                                               placeholder="@lang('dictionary.book.placeholders.price')">
                                    </div>
                                    <div class="col-md-12 m-2">
                                        <input class="btn btn-success btn-block" type="submit">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection