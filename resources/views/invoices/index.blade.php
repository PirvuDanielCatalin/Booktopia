@extends('general.shop')

@section('shop-scripts')
    <script type="text/javascript"
            src="{{ secure_asset('js/invoices/index.js') }}" defer></script>
@endsection

@section('shop-styles')
    <link rel="stylesheet" type="text/css"
          href="{{ secure_asset('css/invoices/index.css') }}">
@endsection

@section('scontent')
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
                            <img class=""
                                 src="{{ secure_asset("images/books-covers")."/".$buy->book->photo }}">
                        @else
                            <img class=""
                                 src="{{ secure_asset("images/helpers")."/MissingBookCover.jpg" }}">
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
    <div class="col-md-12 row invoice-div">
        <div class="left-panel col-md-4">
            <div class="p-3 col-md-12 row">
                <div class="col-md-6">@lang('dictionary.invoice.date')</div>
                <div class="col-md-6">{{ $invoice->date }}</div>
            </div>
            <div class="p-3 col-md-12 row">
                <span data-placement="right"
                      data-toggle="tooltip"
                      @if(intval((new \DateTime($invoice->date))->diff(new \DateTime())->format('%h')) < 48)
                      title="@lang('dictionary.invoice.cancel_order_possible',
                      [
                        'datetime' => (new \DateTime($invoice->date))
                            ->add(new \DateInterval('PT48H'))
                            ->format('Y-m-d H:i:s')
                      ])"
                      @else
                      title="@lang('dictionary.invoice.cancel_order_not_possible')"
                      @endif
                >
                    <button class="btn btn-warning btn-block"
                           {{ (intval((new \DateTime($invoice->date))->diff(new \DateTime())->format('%h')) < 48)
                            ? ''
                            : 'disabled' }}
                    >
                    @lang('dictionary.invoice.cancel-order')
                </button>
                </span>
                <span class="ml-2">
                    <button class="btn btn-secondary export-PDF" invoice-id="{{ $invoice->invoice_id }}">Export PDF</button>
                </span>

            </div>
        </div>
        <div class="col-md-3"></div>
        <div class="right-panel col-md-5">
            <div class="p-3 col-md-12 row">
                <div class="col-md-6">@lang('dictionary.profile.fidelity-points')</div>
                <div class="col-md-6">
                    {{ ($invoice->withPoints == true) ? intval(ceil($invoice->total)) : 0 }}
                </div>
            </div>
            <div class="p-3 col-md-12 row">
                <div class="col-md-6">@lang('dictionary.invoice.total_payment')</div>
                <div class="col-md-6">
                    {{ ($invoice->withPoints == true) ? 0 : $invoice->total }}
                </div>
            </div>
        </div>
    </div>
@endsection