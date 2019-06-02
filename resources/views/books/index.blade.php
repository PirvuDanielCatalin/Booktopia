@extends('layouts.app')

@section('scripts')
    <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js" defer></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" defer></script>
    <script type="text/javascript"
            src="{{ asset('js/books/index.js') }}" defer></script>
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('css/books/index.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if( session('success') )
                            <script defer>
                                window.onload = function () {
                                    toastr.success('{{ session('success') }}');
                                };
                            </script>
                        @endif
                        <div class="pb-3">
                            @if(Auth::user()->isAdmin())
                                <button class="btn btn-outline-secondary import-books-btn">
                                    <i class="fas fa-file-upload"></i> @lang('dictionary.book.actions.import-from-CSV')
                                </button>
                            @endif
                            <button class="btn btn-outline-primary add-book-btn">
                                <i class="fas fa-plus"></i> @lang('dictionary.book.actions.add')
                            </button>
                        </div>
                        <table class="table table-hover" id="books-datatable">
                            <thead>
                            <tr>
                                <th>{{-- Show Button --}}</th>
                                <th>ID</th>
                                <th>@lang('dictionary.book.title')</th>
                                <th>@lang('dictionary.book.author')</th>
                                <th>@lang('dictionary.book.publishing_house')</th>
                                <th>@lang('dictionary.book.photo')</th>
                                <th>@lang('dictionary.book.price')</th>
                                @if(Auth::user()->isAdmin())
                                    <th>{{-- Edit Button--}}</th>
                                    <th>{{-- Delete Button --}}</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>
                                        <a href="{{ route('books.show', $book) }}">
                                            <button class="btn btn-outline-info">
                                                <i class="fas fa-book"></i> @lang('dictionary.actions.show')
                                            </button>
                                        </a>
                                    </td>
                                    <td>{{ $book->book_id }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->publishing_house }}</td>
                                    <td>
                                        @if(isset($book->photo))
                                            <img class="book-thumbnail"
                                                 src="{{ asset("images/books-covers")."/".$book->photo }}">
                                        @else
                                            <img class="book-thumbnail"
                                                 src="{{ asset("images/helpers")."/MissingBookCover.jpg" }}">
                                        @endif
                                    </td>
                                    <td>{{ $book->price }}</td>
                                    @if(Auth::user()->isAdmin())
                                        <td>
                                            <a href="{{ route('books.edit', $book) }}">
                                                <button type="button"
                                                        class="btn btn-outline-secondary">
                                                    <i class="far fa-edit"></i> @lang('dictionary.actions.edit')
                                                </button>
                                            </a>
                                        </td>
                                        <td>
                                            <button class="modal-opener btn btn-outline-danger"
                                                    data-toggle="modal"
                                                    data-target="#deleteBookModal"
                                                    book-id="{{ $book->book_id }}">
                                                <i class="far fa-trash-alt"></i> @lang('dictionary.actions.delete')
                                            </button>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div aria-hidden="true"
                         aria-labelledby="deleteBookModalLabel"
                         class="modal fade"
                         id="deleteBookModal"
                         role="dialog"
                         tabindex="-1">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteBookModalLabel">
                                        @lang('dictionary.book.actions.delete')
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                </div>
                                <div class="modal-footer">
                                    <button type="button"
                                            class="btn btn-danger"
                                            data-dismiss="modal">
                                        @lang('dictionary.actions.cancel')
                                    </button>
                                    <button type="button" class="btn btn-success" book-id="" id="confirmDeleteBook">
                                        @lang('dictionary.actions.delete')
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
