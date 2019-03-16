@extends('layouts.app')

@section('scripts')
    <script src="{{ asset('js/categories/index.js') }}" defer></script>
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/categories/index.css') }}">
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

                        <div class="header pl-4 pr-4 mb-2">
                            <h2 class="d-inline-block">Categories</h2>
                            <button class="btn btn-primary float-right" data-toggle="modal"
                                    data-target="#addCategoryModal">
                                Add Category
                            </button>
                        </div>

                        <div class="categories-container col-md-12">
                            @foreach($categories as $category)
                                <button class="btn category-btn"
                                        category-id="{{ $category->id }}"
                                        data-toggle="modal" data-target="#infoCategoryModal">
                                    {{ $category->name }}
                                </button>
                            @endforeach
                        </div>

                        <div style="float: right">
                            {{ $categories->links() }}
                        </div>
                    </div>

                    <div class="modal fade" id="infoCategoryModal" tabindex="-1" role="dialog"
                         aria-labelledby="infoCategoryModalLabel" aria-hidden="true" category-id="">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="infoCategoryModalLabel">Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-12 form-div">
                                        <input type="text" name="name" class="form-control" value="">
                                        <button type="button" class="btn btn-outline-success"><i class="far fa-save"></i> Save</button>
                                    {{--</div>
                                    <div class="col-md-12 form-div">--}}
                                        <button type="button" class="btn btn-outline-info"><i class="far fa-edit"></i> Edit</button>
                                        <button type="button" class="btn btn-outline-danger"
                                                data-toggle="modal" data-target="#deleteCategoryModal">
                                            <i class="far fa-trash-alt"></i> Delete
                                        </button>
                                    </div>
                                    <div>
                                        {{-- Slider cu carti apartinand categoriei --}}
                                    </div>
                                </div>
                            </div>
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
                                            <label for="name" class="add-label">Name:</label>
                                            <input type="text" name="name" class="form-control"
                                                   required pattern="[A-Za-z]+" title="Only letters are allowed!">
                                        </div>
                                        <div class="col-md-12 form-div">
                                            <input type="submit" class="btn btn-success btn-block">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="deleteCategoryModal" tabindex="-1" role="dialog"
                         aria-labelledby="deleteCategoryModalLabel" aria-hidden="true" category-id="">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteCategoryModalLabel">Delete Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete category?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-success" id="confirmDeleteCategory">
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
