@extends('layouts.app')

@section('scripts')
    <script src="{{ asset('js/books/index.js') }}" defer></script>
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/books/index.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if( session('succes') )
                            <div class="alert alert-success">
                                {{ session('succes') }}
                            </div>
                        @endif
                        <div class="row inside-nav">
                            <div class="input-group search-bar-div col-md-4">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-info" type="button"><i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="offset-md-6 col-md-2 add-book-btn">
                                <a href="{{ route('books.create') }}">
                                    <button class="btn btn-outline-primary">
                                        <i class="fas fa-plus"></i> @lang('dictionary.book.actions.add')</button>
                                </a>
                            </div>
                        </div>
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th><!-- Show Button --></th>
                                <th>ID</th>
                                <th>@lang('dictionary.book.title')</th>
                                <th>@lang('dictionary.book.author')</th>
                                <th>@lang('dictionary.book.publishing_house')</th>
                                <th>@lang('dictionary.book.description')</th>
                                <th>@lang('dictionary.book.photo')</th>
                                <th>@lang('dictionary.book.price')</th>
                                <th><!-- Edit Button --></th>
                                <th><!-- Delete Button --></th>
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
                                    <td>{{ $book->id }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->publishing_house }}</td>
                                    <td id="book-description">{{ $book->description }}</td>
                                    <td><img class="book-thumbnail" src="{{ public_path('images/') . $book->photo }}">
                                    </td>
                                    <td>{{ $book->price }}</td>
                                    <td>
                                        <a href="{{ route('books.edit', $book) }}">
                                            <button type="button"
                                                    class="btn btn-outline-secondary">
                                                <i class="far fa-edit"></i> @lang('dictionary.actions.edit')
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <button class="modal-openner btn btn-outline-danger" data-toggle="modal"
                                                data-target="#deleteBookModal" book-id="{{ $book->id }}">
                                            <i class="far fa-trash-alt"></i> @lang('dictionary.actions.delete')
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="float: right">
                            {{ $books->links() }}
                        </div>
                    </div>
                    <div class="modal fade" id="deleteBookModal" tabindex="-1" role="dialog"
                         aria-labelledby="deleteBookModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteBookModalLabel">Delete Book</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete book ........ ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-success" book-id="" id="confirmDeleteBook">
                                        Delete
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
