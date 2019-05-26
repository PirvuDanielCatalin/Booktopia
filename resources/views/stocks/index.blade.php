@extends('layouts.app')

@section('scripts')
    <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js" defer></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" defer></script>
    <script type="text/javascript"
            src="{{ asset('js/stocks/index.js') }}" defer></script>
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('css/stocks/index.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body row">
                        <div class="big-view col-md-8">
                            <div class="table-responsive">
                                <table class="table table-hover" id="stocks-datatable">
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
                            <img src="{{ asset("images/views-right-panels")."/Stocks_Right_Panel.png" }}"
                                 alt="StocksPageRightPanel" class="stocks_page_right_panel_img">
                            <div class="stocks_page_right_panel">
                                <div class="form">
                                    <div class="row">
                                        <div class="col-md-12 row m-auto p-2">
                                            <button class="btn btn-outline-info w-100 edit-stock-btn">
                                                <i class="far fa-edit"></i> @lang('dictionary.actions.edit')
                                            </button>
                                        </div>
                                        <input type="hidden" class="stock_id" value="">
                                        <div class="col-md-12 form-input update-stock-div p-2">
                                            <label for="title">@lang('dictionary.book.title')</label>
                                            <input class="form-control"
                                                   disabled
                                                   name="title"
                                                   type="text"
                                                   value="">
                                        </div>
                                        <div class="col-md-12 form-input update-stock-div p-2">
                                            <label for="quantity">@lang('dictionary.book.quantity')</label>
                                            <input class="form-control"
                                                   disabled
                                                   name="quantity"
                                                   type="text"
                                                   value="">
                                        </div>
                                        <div class="col-md-12 form-input update-stock-div p-2">
                                            <label for="plus-minus-quantity">@lang('dictionary.stock.plus-minus-quantity')</label>
                                            <input class="form-control"
                                                   data-placement="top"
                                                   data-toggle="tooltip"
                                                   disabled
                                                   min=""
                                                   name="plus-minus-quantity"
                                                   placeholder="@lang('dictionary.stock.positive-or-negative-value')"
                                                   title="@lang('dictionary.stock.tooltips.positive-or-negative-value')"
                                                   type="number"
                                                   value="">
                                        </div>
                                        <div class="col-md-12 form-input update-stock-div p-2">
                                            <button class="btn btn-outline-success w-100 update-stock-btn">
                                                <i class="far fa-save"></i> @lang('dictionary.actions.save')
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection