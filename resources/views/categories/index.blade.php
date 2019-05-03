@extends('layouts.app')

@section('scripts')
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" defer></script>
    <script type="text/javascript"
            src="{{ asset('js/categories/index.js') }}" defer></script>
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('css/categories/index.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="big-view">
                            <div class="header pl-4 pr-4 mb-2">
                                <h2 class="d-inline-block">@lang('dictionary.category.categories')</h2>
                                <button class="btn btn-outline-primary float-right add-category-btn">
                                    <i class="fas fa-plus"></i> @lang('dictionary.category.actions.add')
                                </button>
                            </div>
                            <div class="categories-container col-md-12">
                                @foreach($categories as $category)
                                    <button class="btn category-btn"
                                            category-id="{{ $category->id }}">
                                        {{ $category->name }}
                                    </button>
                                @endforeach
                            </div>
                            <div style="float: right">
                                {{ $categories->links() }}
                            </div>
                        </div>
                        <div class="small-view">
                            <img src="{{ asset("images/views-right-panels")."/Categories_Right_Panel.jpg" }}"
                                 alt="CategoriesPageRightPanel"
                                 class="categories_page_right_panel_img">
                            <div class="categories_page_right_panel">
                                <div class="form">
                                    <div class="row">
                                        <input type="hidden" class="category_id" value="">
                                        <div class="col-md-12 form-input p-2">
                                            <button class="btn btn-outline-info edit-category-btn">
                                                <i class="far fa-edit"></i> @lang('dictionary.actions.edit')
                                            </button>
                                            <button class="btn btn-outline-danger delete-category-btn"
                                                    data-target="#deleteCategoryModal"
                                                    data-toggle="modal">
                                                <i class="far fa-trash-alt"></i> @lang('dictionary.actions.delete')
                                            </button>
                                        </div>
                                        <div class="col-md-12 form-input p-2">
                                            <label for="name">@lang('dictionary.category.name')</label>
                                            <input class="form-control"
                                                   name="name"
                                                   type="text"
                                                   value="">
                                        </div>
                                        <div class="col-md-12 form-input p-2">
                                            <div class="books-panel">
                                                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                            </div>
                                        </div>
                                        <div class="col-md-12 form-input p-2">
                                            <button class="btn btn-success w-100">
                                                <i class="far fa-save"></i> @lang('dictionary.actions.save')
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div aria-hidden="true"
                         aria-labelledby="deleteCategoryModalLabel"
                         category-id=""
                         class="modal fade"
                         id="deleteCategoryModal"
                         role="dialog"
                         tabindex="-1">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"
                                        id="deleteCategoryModalLabel">@lang('dictionary.category.actions.delete')</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body"></div>
                                <div class="modal-footer">
                                    <button class="btn btn-danger"
                                            data-dismiss="modal"
                                            type="button">@lang('dictionary.actions.cancel')</button>
                                    <button category-id=""
                                            class="btn btn-success"
                                            id="confirmDeleteCategory"
                                            type="button">
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
