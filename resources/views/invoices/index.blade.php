@extends('general.shop')

@section('shop-scripts')
    <script type="text/javascript"
            src="{{ asset('js/invoices/index.js') }}" defer></script>
@endsection

@section('shop-styles')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('css/invoices/index.css') }}">
@endsection

@section('scontent')
    <div class="col-md-12 invoice-div">
        <div class="invoice-div-title">
            @lang('dictionary.user.name')
        </div>
        <div class="form-control invoice-input">

        </div>
    </div>
    <div class="col-md-12 invoice-div">
        <div class="invoice-div-title">
            @lang('dictionary.invoice.billing_address')
        </div>
        <div class="form-control invoice-input">

        </div>
    </div>
    <div class="col-md-12 invoice-div">
        <div class="invoice-div-title">
            @lang('dictionary.invoice.delivery_address')
        </div>
        <div class="form-control invoice-input">

        </div>
    </div>
    <div class="col-md-12 card border-0 invoice-div invoice-products-panel">
        <div class="card-header">Produse</div>
        <div class="products-table card-body">
            @for($i=1;$i<=10;$i++)
                <div class="products-table-row">
                    <div class="product-name">
                        nume carte
                    </div>
                    <div class="product-img">
                        <img src="{{ asset("images/helpers")."/MissingBookCover.jpg" }}">
                    </div>
                    <div class="product-quantity">
                        4
                    </div>
                    <div class="product-price">
                        2356
                    </div>
                </div>
            @endfor
        </div>
    </div>
    <div class="col-md-12 row invoice-div">
        <div class="left-panel col-md-4">
            <div class="p-3 col-md-12 row">
                <div class="col-md-6">Data</div>
                <div class="col-md-6">26/02/2019</div>
            </div>
            <div class="p-3 col-md-12 row">
                <button class="btn btn-warning btn-block"
                        data-placement="right"
                        data-toggle="tooltip"
                        title="@lang('dictionary.invoice.cancel_order_possible')">
                    anuleaza comanda
                </button>
            </div>
        </div>
        <div class="col-md-3"></div>
        <div class="right-panel col-md-5">
            <div class="p-3 col-md-12 row">
                <div class="col-md-6">puncte</div>
                <div class="col-md-6">456</div>
            </div>
            <div class="p-3 col-md-12 row">
                <div class="col-md-6">total</div>
                <div class="col-md-6">78995</div>
            </div>
        </div>
    </div>
@endsection