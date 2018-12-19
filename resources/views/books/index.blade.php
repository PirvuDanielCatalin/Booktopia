@extends('layouts.app')

@section('scripts')
    <script src="{{ asset('js/books/index.js') }}" defer></script>
@endsection

@section('styles')

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('books.create') }}">Introdu o noua carte</a>
                    </div>
                    <div class="card-body">
                        @if( session('succes') )
                            <div class="alert alert-success">
                                {{ session('succes') }}
                            </div>
                        @endif
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Publishing House</th>
                                <th>Description</th>
                                <th>Photo</th>
                                <th>Price</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>{{ $book->id }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->publishing_house }}</td>
                                    <td>{{ $book->description }}</td>
                                    <td>{{ $book->photo }}</td>
                                    <td>{{ $book->price }}</td>
                                    <td>
                                        <button class="btn btn-primary">Show</button>
                                    </td>
                                    <td>
                                        <button class="modal-openner btn btn-danger" data-toggle="modal" data-target="#deleteBookModal" book-id="{{ $book->id }}">
                                            Delete
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
                                    <button type="button" class="btn btn-success" book-id="" id="confirmDeleteBook">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
