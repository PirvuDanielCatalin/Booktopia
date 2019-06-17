@extends('layouts.app')

@section('scripts')
    <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js" defer></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" defer></script>
    <script type="text/javascript"
            src="{{ secure_asset('js/offers/index.js') }}" defer></script>
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="{{ secure_asset('css/offers/index.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body row">
                        <div class="big-view col-md-8">
                            <div class="pb-3">
                                <button class="btn btn-outline-primary add-offer-btn">
                                    <i class="fas fa-plus"></i> @lang('dictionary.offer.actions.add')
                                </button>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover" id="offers-datatable">
                                    <thead>
                                    <tr>
                                        <th class="tbl-book-id">ID:</th>
                                        <th class="tbl-book-title">@lang('dictionary.book.title')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($books as $book)
                                        <tr class="tbl-book-info">
                                            <td class="tbl-book-id">{{ $book->id }}</td>
                                            <td class="tbl-book-title">{{ $book->title }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="small-view col-md-4">
                            <img src="{{ secure_asset("images/views-right-panels")."/Offers_Right_Panel.png" }}"
                                 alt="OffersPageRightPanel" class="offers_page_right_panel_img">
                            <div class="offers_page_right_panel">
                                <div class="form">
                                    <div class="row">
                                        <input type="hidden" class="offer_id" value="">
                                        <div class="col-md-12 row m-auto p-2">
                                            <button class="btn btn-outline-info w-50 edit-offer-btn">
                                                <i class="far fa-edit"></i> @lang('dictionary.actions.edit')
                                            </button>
                                            <button class="btn btn-outline-danger w-50 delete-offer-btn"
                                                    data-target="#deleteOfferModal"
                                                    data-toggle="modal">
                                                <i class="far fa-trash-alt"></i> @lang('dictionary.actions.delete')
                                            </button>
                                        </div>
                                        <div class="col-md-12 form-input update-offer-div p-2">
                                            <label for="title">@lang('dictionary.book.title')</label>
                                            <input type="text" name="title"
                                                   class="form-control"
                                                   value="" disabled>
                                        </div>
                                        <div class="col-md-12 form-input update-offer-div p-2">
                                            <label for="old-price">@lang('dictionary.offer.old-price')</label>
                                            <input type="text" name="old-price"
                                                   class="form-control"
                                                   value="" disabled>
                                        </div>
                                        <div class="col-md-12 form-input update-offer-div p-2">
                                            <label for="sale">@lang('dictionary.offer.sale')</label>
                                            <input type="text" name="sale"
                                                   class="form-control"
                                                   value="" disabled>
                                        </div>
                                        <div class="col-md-12 form-input update-offer-div p-2">
                                            <label for="new-price">@lang('dictionary.offer.new-price')</label>
                                            <input type="text" name="new-price"
                                                   class="form-control"
                                                   value="" disabled>
                                        </div>
                                        <div class="col-md-12 form-input update-offer-div p-2">
                                            <button class="btn btn-success update-offer-btn w-100">
                                                @lang('dictionary.actions.save')
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div aria-hidden="true"
                         aria-labelledby="deleteOfferModalLabel"
                         offer-id=""
                         class="modal fade"
                         id="deleteOfferModal"
                         role="dialog"
                         tabindex="-1">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteOfferModalLabel">
                                        @lang('dictionary.offer.actions.delete')
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body"></div>
                                <div class="modal-footer">
                                    <button class="btn btn-danger"
                                            data-dismiss="modal"
                                            type="button">@lang('dictionary.actions.cancel')</button>
                                    <button offer-id=""
                                            class="btn btn-success"
                                            id="confirmOfferBtn"
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