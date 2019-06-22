@extends('layouts.app')

@section('scripts')
    <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js" defer></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" defer></script>
    <script type="text/javascript"
            src="{{ secure_asset('js/requirements/index.js') }}" defer></script>
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="{{ secure_asset('css/requirements/index.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body row">
                        <div class="big-view col-md-8">
                            <div class="table-responsive">
                                @if(sizeof($requirements) > 0)
                                    <table class="table table-hover" id="requirements-datatable">
                                        <thead>
                                        <tr>
                                            <th class="tbl-requirement-checkbox"></th>
                                            <th class="tbl-requirement-id">@lang('dictionary.requirement.id')</th>
                                            <th class="tbl-requirement-partner-id">@lang('dictionary.requirement.partner-id')</th>
                                            <th class="tbl-requirement-partner-name">@lang('dictionary.requirement.partner-name')</th>
                                            <th class="tbl-requirement-book-id">@lang('dictionary.requirement.book-id')</th>
                                            <th class="tbl-requirement-book-title">@lang('dictionary.requirement.book-title')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($requirements as $requirement)
                                            <tr class="tbl-requirement-info"
                                                requirement-id="{{ $requirement->requirement_id }}"
                                                @if($requirement->status == -1)
                                                style="background-color: #ffbcbc"
                                                @endif
                                                @if($requirement->status == 0)
                                                style="background-color: #ececec"
                                                @endif
                                                @if($requirement->status == 1)
                                                style="background-color: #b6ffc6"
                                                    @endif
                                            >
                                                <td class="tbl-requirement-checkbox">
                                                    <input type="checkbox" class="form-check-input">
                                                </td>
                                                <td class="tbl-requirement-id">
                                                    {{ $requirement->requirement_id }}
                                                </td>
                                                <td class="tbl-requirement-partner-id">
                                                    {{ $requirement->user->id }}
                                                </td>
                                                <td class="tbl-requirement-partner-name">
                                                    {{ $requirement->user->name }}
                                                </td>
                                                <td class="tbl-requirement-book-id">
                                                    {{ $requirement->book->book_id }}
                                                </td>
                                                <td class="tbl-requirement-book-title">
                                                    {{ $requirement->book->title }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <div class="p-3 ">
                                        <h3>
                                            <b>@lang('dictionary.requirement.no-requirements')</b>
                                        </h3>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="small-view col-md-4">
                            <img alt="RequirementsPageRightPanel"
                                 class="requirements_page_right_panel_img"
                                 src="{{ secure_asset("images/views-right-panels")."/Requirements_Right_Panel.png" }}">
                            <div class="requirements_page_right_panel">
                                <div class="form">
                                    <div class="row">
                                        <input type="hidden" class="requirement_id" value="">
                                        <div class="col-md-12 form-input update-requirement-div p-2">
                                            <label for="title">@lang('dictionary.book.title')</label>
                                            <input type="text" name="title"
                                                   class="form-control"
                                                   value="" disabled>
                                        </div>
                                        <div class="col-md-12 form-input update-requirement-div p-2">
                                            <label for="name">@lang('dictionary.user.name')</label>
                                            <input type="text" name="name"
                                                   class="form-control"
                                                   value="" disabled>
                                        </div>
                                        <div class="col-md-12 form-input update-requirement-div p-2">
                                            <label for="quantity">@lang('dictionary.book.quantity')</label>
                                            <input type="text" name="quantity"
                                                   class="form-control"
                                                   value="" disabled>
                                        </div>
                                        @if (Auth::user()->isPartner())
                                            <div class="col-md-12 form-input update-requirement-div p-2">
                                                <button class="btn btn-outline-info w-100 mb-1 show-requirement-btn">
                                                    <i class="fas fa-eye"></i> @lang('dictionary.actions.show')
                                                </button>
                                                <button class="btn btn-outline-danger w-100 mb-1 delete-requirement-btn"
                                                        data-target="#deleteRequirementModal"
                                                        data-toggle="modal">
                                                    <i class="far fa-trash-alt"></i> @lang('dictionary.actions.delete')
                                                </button>
                                            </div>
                                        @endif
                                        @if (Auth::user()->isAdmin())
                                            <div class="col-md-12 form-input update-requirement-div p-2">
                                                <button class="btn btn-outline-info w-100 mb-1 show-requirement-btn">
                                                    <i class="fas fa-eye"></i> @lang('dictionary.actions.show')
                                                </button>
                                                <button class="btn btn-outline-success w-100 mb-1 accept-requirement-btn"
                                                        data-target="#RequirementModal"
                                                        data-toggle="modal">
                                                    <i class="far fa-check-circle"></i> @lang('dictionary.actions.accept')
                                                </button>
                                                <button class="btn btn-outline-danger w-100 mb-1 deny-requirement-btn"
                                                        data-target="#RequirementModal"
                                                        data-toggle="modal">
                                                    <i class="far fa-times-circle"></i> @lang('dictionary.actions.deny')
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div aria-hidden="true"
                               aria-labelledby="RequirementModalLabel"
                               requirement-id=""
                               class="modal fade"
                               id="RequirementModal"
                               role="dialog"
                               tabindex="-1">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="RequirementModalLabel">

                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body"></div>
                                <div class="modal-footer">
                                    <button class="btn btn-danger"
                                            data-dismiss="modal"
                                            type="button">
                                        @lang('dictionary.actions.cancel')
                                    </button>
                                    <button class="btn btn-success"
                                            id="confirmRequirement"
                                            requirement-id=""
                                            type="button">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div aria-hidden="true"
                         aria-labelledby="deleteRequirementModalLabel"
                         class="modal fade"
                         id="deleteRequirementModal"
                         role="dialog"
                         tabindex="-1">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteRequirementModalLabel">
                                        @lang('dictionary.requirement.actions.delete')
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @lang('dictionary.requirement.actions.delete-question')
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-danger"
                                            data-dismiss="modal"
                                            type="button">
                                        @lang('dictionary.actions.cancel')
                                    </button>
                                    <button class="btn btn-success"
                                            id="confirmDeleteRequirement"
                                            requirement-id=""
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