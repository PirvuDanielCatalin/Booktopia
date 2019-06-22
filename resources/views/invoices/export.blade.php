<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .invoice-div {
            display: flex;
            padding: 1rem;
        }

        .invoice-div-title {
            width: 15%;
        }

        .invoice-input {
            float: right;
            border: 0;
            border-bottom: 1px solid #d0d0d0;
        }

        .invoice-products-panel .card-header {
            cursor: pointer;
        }


        .products-table-row {
            display: table;
            border-bottom: 1px solid #b3b3b3;
            padding: 0.5rem;
            width: 100%;
        }

        .product-name,
        .product-img,
        .product-quantity,
        .product-price {
            display: table-cell;
            vertical-align: middle;
        }

        .product-name {
            width: 35%;
        }

        .product-img {
            width: 25%;
        }

        .product-img img {
            height: 20%;
            border: 1px solid #d0d0d0;
        }

        .product-quantity,
        .product-price {
            width: 20%;
        }

        .book-thumbnail {
            width: 50px;
            height: 80px;
        }

        .invoice-div:last-child .left-panel .col-md-12.row .col-md-6:last-child,
        .invoice-div:last-child .right-panel .col-md-12.row .col-md-6:last-child {
            border-bottom: 1px solid #c7c7c7;
        }
    </style>
</head>
<body>
<div class="col-md-12 invoice-div">
    <div class="invoice-div-title">
        @lang('dictionary.user.name')
    </div>
    <div class="form-control invoice-input">
        {{ $invoice->user->first_name.' '.$invoice->user->last_name }}
    </div>
</div>
<div class="col-md-12 invoice-div">
    <div class="invoice-div-title">
        @lang('dictionary.invoice.billing_address')
    </div>
    <div class="form-control invoice-input">
        {{ $invoice->billing_address }}
    </div>
</div>
<div class="col-md-12 invoice-div">
    <div class="invoice-div-title">
        @lang('dictionary.invoice.delivery_address')
    </div>
    <div class="form-control invoice-input">
        {{ $invoice->delivery_address }}
    </div>
</div>
<div class="col-md-12 card border-0 invoice-div invoice-products-panel">
    <div class="card-header">@lang('dictionary.invoice.products')</div>
    <div class="products-table card-body">
        @foreach($invoice->buys as $buy)
            <div class="products-table-row">
                <div class="product-name">
                    {{ $buy->book->title }}
                </div>
                <div class="product-img">
                    @if(isset($buy->book->photo))
                        <img class="book-thumbnail"
                             src="{{ "https://shop-booktopia.herokuapp.com/images/books-covers/".$buy->book->photo }}">
                    @else
                        <img class="book-thumbnail"
                             src="{{ "https://shop-booktopia.herokuapp.com/images/helpers/MissingBookCover.jpg" }}">
                    @endif
                </div>
                <div class="product-quantity">
                    {{ $buy->quantity }}
                </div>
                <div class="product-price">
                    {{ round($buy->quantity * $buy->book->price, 2) }}
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="col-md-12 invoice-div">
    <div class="invoice-div-title">
        @lang('dictionary.invoice.date')
    </div>
    <div class="form-control invoice-input">
        {{ $invoice->date }}
    </div>
</div>
<div class="col-md-12 invoice-div">
    <div class="invoice-div-title">
        @lang('dictionary.profile.fidelity-points')
    </div>
    <div class="form-control invoice-input">
        {{ ($invoice->withPoints == true) ? intval(ceil($invoice->total)) : 0 }}
    </div>
</div>
<div class="col-md-12 invoice-div">
    <div class="invoice-div-title">
        @lang('dictionary.invoice.total_payment')
    </div>
    <div class="form-control invoice-input">
        {{ ($invoice->withPoints == true) ? 0 : $invoice->total }}
    </div>
</div>
</body>
</html>