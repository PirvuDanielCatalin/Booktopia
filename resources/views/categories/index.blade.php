@extends('layouts.app')

@section('scripts')
    <script src="{{ asset('js/categories/index.js') }}" defer></script>
@endsection

@section('styles')

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
                        <button class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">
                            Add Category
                        </button>
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <button class="btn btn-primary">Edit</button>
                                    </td>
                                    <td>
                                        <button class="modal-openner btn btn-danger" data-toggle="modal"
                                                data-target="#deleteCategoryModal" book-id="{{ $category->id }}">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="float: right">
                            {{ $categories->links() }}
                        </div>
                    </div>
                    <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog"
                         aria-labelledby="addCategoryModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addCategoryModalLabel">Add Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ route('categories.store') }}">
                                        @csrf
                                        <div class="col-md-12 form-div">
                                            <label for="title">Name:</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                        <div class="col-md-12 form-div">
                                            <input type="submit" class="btn btn-success btn-block">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-success" book-id="" id="confirmDeleteCategory">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="deleteCategoryModal" tabindex="-1" role="dialog"
                         aria-labelledby="deleteCategoryModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteCategoryModalLabel">Delete Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete category ........ ?
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
