@extends('general.shop')

@section('shop-scripts')
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" defer></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" defer></script>
    <script type="text/javascript"
            src="{{ secure_asset('libs/jquery.session.js') }}" defer></script>
    <script type="text/javascript"
            src="{{ secure_asset('js/general/shopping-cart.js') }}" defer></script>
@endsection

@section('shop-styles')
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="{{ secure_asset('css/general/shopping-cart.css') }}">
@endsection

@section('scontent')
    @if(isset($errors) && count($errors) > 0)
        <script defer>
            window.onload = function () {
                @foreach($errors->getMessages() as $key => $error)
                toastr.error('{{ $error[0] }}');
                @endforeach
            };
        </script>
    @endif
    <div class="col-md-12">
        <h3>Your shopping cart:</h3>
    </div>
    <div class="col-md-12">
        <h5 class="no-products-h" style="display: {{ (count($products) == 0) ? 'block' : 'none'}}">
            @lang('dictionary.general.shopping-cart.nothing-in-cart')<br>
            <a href="{{ url('/') }}"
               class="no-products-redirect">@lang('dictionary.general.shopping-cart.go-to-shop')</a>
        </h5>
        @if(count($products) > 0)
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
                        <td class="tbl-book-id">{{ $product['book']->book_id }}</td>
                        <td class="tbl-book-title">{{ $product['book']->title }}</td>
                        <td class="tbl-book-quantity">
                            <input book-price="{{ $product['book']->price }}"
                                   type="hidden">
                            <button class="btn btn-outline-secondary d-inline-block quantity-minus"
                                    type="button">-1
                            </button>
                            <input class="form-control d-inline-block text-center"
                                   max="{{ $product['book']->stock->amount }}"
                                   min="1"
                                   type="number"
                                   value="{{ $product['quantity'] }}">
                            <button type="button"
                                    class="btn btn-outline-secondary d-inline-block quantity-plus">+1
                            </button>
                        </td>
                        <td class="tbl-book-price">
                            <input class="form-control text-center"
                                   disabled
                                   type="number"
                                   value="{{ round($product['quantity'] * $product['book']->price, 2) }}">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
                <div class="user-points-div">
                    <div class="user-points-value-div">
                        <b>@lang('dictionary.general.shopping-cart.fidelity-points'):</b>
                    </div>
                    @if(Auth::user())
                        <div class="user-points-value">
                            @if(Auth::user()->profile)
                                <b>{{ Auth::user()->profile->wallet }}</b>
                            @else
                                <b>0</b>
                            @endif
                        </div>
                        <span data-toggle="modal"
                              data-target="#usePointsModal">
                            <button class="btn btn-outline-secondary user-points-btn"
                                    data-placement="top"
                                    data-toggle="tooltip"
                                    title="@lang('dictionary.actions.use')">
                                <i class="fas fa-certificate"></i>
                            </button>
                        </span>
                    @else
                        <div class="user-points-value">
                            <b>@lang('dictionary.general.shopping-cart.login-use-points')</b>
                        </div>
                    @endif
                </div>
                <div class="products-total-price-div">
                    <div class="products-total-price-value-div"><b>Total:</b></div>
                    <div class="products-total-price-value"><b></b></div>
                </div>
                <button class="btn btn-outline-secondary btn-lg products-total-price-checkout-btn"
                        type="button"
                        user-logged="{{ (Auth::user()) ? 'true' : 'false' }}">
                    <b>@lang('dictionary.actions.checkout')</b>
                </button>
                <form method="post" action="{{ route('invoices.store') }}">
                    @csrf
                    <input type="hidden" name="shopping_cart" value="{{ $shopping_cart }}">
                    <div class="card billing_address_card">
                        <div class="card-header text-center">
                            @lang('dictionary.invoice.billing_address')
                            <span class="caret-down float-right" style="display: none;">
                                <i class="fas fa-caret-down fa-2x"></i>
                            </span>
                            <span class="caret-up float-right">
                                <i class="fas fa-sort-up fa-2x"></i>
                            </span>
                        </div>
                        <div class="card-body row">
                            @if(isset(Auth::user()->profile->adress) && !empty(trim(Auth::user()->profile->adress)))
                                <div class="col-md-6">
                                    <label class="d-flex">
                                        <input name="billing_address_radio"
                                               required
                                               type="radio"
                                               value="1">
                                        <div class="w-100 under-radio-input">
                                            {{ Auth::user()->profile->adress }}
                                        </div>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="d-flex">
                                        <input name="billing_address_radio"
                                               required
                                               type="radio"
                                               value="2">
                                        <textarea rows="2"
                                                  name="billing_address_textarea"
                                                  class="form-control"></textarea>
                                    </label>
                                </div>
                            @else
                                <div class="col-md-12">
                                    <label class="d-flex">
                                        <input name="billing_address_radio"
                                               required
                                               type="radio"
                                               value="2">
                                        <textarea rows="2"
                                                  name="billing_address_textarea"
                                                  class="form-control"></textarea>
                                    </label>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card delivery_address_card">
                        <div class="card-header text-center">
                            @lang('dictionary.invoice.delivery_address')
                            <span class="caret-down float-right" style="display: none;">
                                <i class="fas fa-caret-down fa-2x"></i>
                            </span>
                            <span class="caret-up float-right">
                                <i class="fas fa-sort-up fa-2x"></i>
                            </span>
                        </div>
                        <div class="card-body row">
                            @if(isset(Auth::user()->profile->adress) && !empty(trim(Auth::user()->profile->adress)))
                                <div class="col-md-6">
                                    <label class="d-flex">
                                        <input name="delivery_address_radio"
                                               required
                                               type="radio"
                                               value="1">
                                        <div class="w-100 under-radio-input">
                                            {{ Auth::user()->profile->adress }}
                                        </div>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="d-flex">
                                        <input name="delivery_address_radio"
                                               required
                                               type="radio"
                                               value="2">
                                        <textarea rows="2"
                                                  name="delivery_address_textarea"
                                                  class="form-control"></textarea>
                                    </label>
                                </div>
                            @else
                                <div class="col-md-12">
                                    <label class="d-flex">
                                        <input name="delivery_address_radio"
                                               required
                                               type="radio"
                                               value="2">
                                        <textarea rows="2"
                                                  name="delivery_address_textarea"
                                                  class="form-control"></textarea>
                                    </label>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card payment_method_card">
                        <div class="card-header text-center">
                            @lang('dictionary.invoice.payment_method')
                            <span class="caret-down float-right" style="display: none;">
                                <i class="fas fa-caret-down fa-2x"></i>
                            </span>
                            <span class="caret-up float-right">
                                <i class="fas fa-sort-up fa-2x"></i>
                            </span>
                        </div>
                        <div class="card-body row">
                            <div class="col-md-6">
                                <label class="d-flex">
                                    <input name="payment_method_radio"
                                           required
                                           type="radio"
                                           value="1">
                                    <div class="w-100 under-radio-input">
                                        Ramburs
                                    </div>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label class="d-flex">
                                    <input disabled
                                           name="payment_method_radio"
                                           required
                                           type="radio"
                                           value="2">
                                    <div class="w-100 under-radio-input">
                                        Card (PayU)
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="card price_card">
                        <div class="card-header text-center">
                            @lang('dictionary.book.price')
                            <span class="caret-down float-right" style="display: none;">
                                <i class="fas fa-caret-down fa-2x"></i>
                            </span>
                            <span class="caret-up float-right">
                                <i class="fas fa-sort-up fa-2x"></i>
                            </span>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="user_used_points" value="false">
                            <div class="col-md-12 p-4">

                            </div>
                            <div class="col-md-12">
                                <input class="btn btn-success btn-block" type="submit">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @endif
    </div>
    <div aria-hidden="true"
         aria-labelledby="usePointsModalLabel"
         class="modal fade"
         id="usePointsModal"
         role="dialog"
         tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="usePointsModalLabel">
                        @lang('dictionary.book.actions.delete')
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-danger"
                            data-dismiss="modal">
                        @lang('dictionary.actions.cancel')
                    </button>
                    <button type="button" class="btn btn-success" id="confirmUsePoints">
                        @lang('dictionary.actions.use')
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
