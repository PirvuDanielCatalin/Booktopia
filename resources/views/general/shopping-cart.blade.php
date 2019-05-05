@extends('general.shop')

@section('shop-scripts')
    <script type="text/javascript"
            src="{{ asset('js/general/shopping-cart.js') }}" defer></script>
@endsection

@section('shop-styles')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('css/general/shopping-cart.css') }}">
@endsection

@section('scontent')
    <div class="col-md-12">
        <h3>Your shopping cart:</h3>
    </div>
    <div class="col-md-12">
        @if(empty($products))
            <h5 class="no-products-h">
                You don't have any product in the shopping cart!<br>
                <a href="{{ url('/') }}" class="no-products-redirect">Go to Shop</a>
            </h5>
        @else
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th class="tbl-book-id">ID:</th>
                    <th class="tbl-book-title">@lang('dictionary.book.title')</th>
                    <th class="tbl-book-quantity">@lang('dictionary.book.quantity')</th>
                    <th class="tbl-book-price">@lang('dictionary.book.price')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td class="tbl-book-id">{{ $product['book']->id }}</td>
                        <td class="tbl-book-title">{{ $product['book']->title }}</td>
                        <td class="tbl-book-quantity">
                            <input type="hidden" book-price="{{ $product['book']->price }}">
                            <button type="button" class="btn btn-outline-secondary d-inline-block quantity-minus">-1
                            </button>
                            <input type="number" value="{{ $product['quantity'] }}" step="0.01"
                                   class="form-control d-inline-block text-center">
                            <button type="button" class="btn btn-outline-secondary d-inline-block quantity-plus">+1
                            </button>
                        </td>
                        <td class="tbl-book-price">
                            <input type="number" class="form-control text-center" step="0.01"
                                   value="{{ $product['quantity'] * $product['book']->price }}" disabled>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
                <div class="products-total-price-div">
                    <div class="products-total-price-value-div"><b>Total:</b></div>
                    <div class="products-total-price-value"><b></b></div>
                    <button type="button" class="btn btn-outline-secondary btn-lg products-total-price-checkout-btn"
                            data-toggle="modal" data-target="#ToBeContinuedModal"
                            user-logged="{{ (Auth::user()) ? 'true' : 'false' }}">
                        <b>@lang('dictionary.actions.checkout')</b></button>
                </div>
            </div>
            <div class="modal fade" id="ToBeContinuedModal" tabindex="-1" role="dialog"
                 aria-labelledby="ToBeContinuedModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ToBeContinuedModalLabel"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            The payment was successfully completed.<br/>
                            Pressing OK will clear the shopping cart (the session).<br/>
                            To be continued...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-success" id="paymentDoneBtn">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
