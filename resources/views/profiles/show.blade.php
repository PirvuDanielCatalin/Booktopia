@extends('general.shop')

@section('shop-scripts')
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" defer></script>
    <script type="text/javascript"
            src="{{ secure_asset('js/profiles/show.js') }}" defer></script>
@endsection

@section('shop-styles')
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="{{ secure_asset('css/profiles/show.css') }}">
@endsection

@section('scontent')
    <div class="col-md-4 card border-0">
        <div class="profile-photo-div card">
            <img alt="ProfilePhoto"
                 class="profile-photo"
                 src="{{ secure_asset("images/helpers")."/MissingProfilePhoto.jpg" }}">
        </div>
        <div class="wallet-points-div card border-0">
            @lang('dictionary.profile.wallet')<br>
            <div class="wallet-points-value">
                {{ $profile->wallet }}
            </div>
        </div>
    </div>
    <div class="col-md-8 card border-0">
        <input name="profile-id"
               type="hidden"
               value="{{ $profile->profile_id }}">
        <div class="profile-cmd-div">
            <button class="btn btn-outline-info float-right m-1 edit-profile-btn"
                    data-placement="top"
                    data-toggle="tooltip"
                    title="@lang('dictionary.actions.edit')">
                <i class="far fa-edit"></i>
            </button>
            <button class="btn btn-outline-success float-right m-1 save-profile-btn"
                    data-placement="top"
                    data-toggle="tooltip"
                    style="display: none"
                    title="@lang('dictionary.actions.save')">
                <i class="far fa-save"></i>
            </button>
        </div>
        <div class="profile-info">
            <b>@lang('dictionary.profile.first_name')</b>
            <input class="profile-info-input"
                   disabled
                   type="text"
                   name="first_name"
                   value="{{ $profile->first_name }}">
        </div>
        <div class="profile-info">
            <b>@lang('dictionary.profile.last_name')</b>
            <input class="profile-info-input"
                   disabled
                   type="text"
                   name="last_name"
                   value="{{ $profile->last_name }}">
        </div>
        <div class="profile-info">
            <b>@lang('dictionary.profile.phone')</b>
            <input class="profile-info-input"
                   disabled
                   type="text"
                   name="phone"
                   value="{{ $profile->phone }}">
        </div>
        <div class="profile-info">
            <b>@lang('dictionary.profile.adress')</b>
            <input class="profile-info-input"
                   disabled
                   type="text"
                   name="adress"
                   value="{{ $profile->adress }}">
        </div>
    </div>
    <div class="col-md-12 card mb-1 wishlist-div">
        <div class="my-2 p-2">
            <b>@lang('dictionary.profile.wishlist')</b>
            <div class="float-right up-down-arrows-panel">
                <span class="caret-down float-right">
                    <i class="fas fa-caret-down fa-2x"></i>
                </span>
                <span class="caret-up d-none float-right">
                    <i class="fas fa-sort-up fa-2x"></i>
                </span>
            </div>
        </div>
        <div class="wishlist-sliding-panel">
            @if(sizeof($wishlist) != 0)
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="carousel-slide">
                                @for($i = 0; $i < 5; $i++)
                                    @if(isset($wishlist[$i]))
                                        <div class="carousel-slide-item">
                                            @if(isset($wishlist[$i]->photo))
                                                <img alt="" class="w-100 rounded"
                                                     src="{{ secure_asset("images/books-covers")."/".$wishlist[$i]->photo }}">
                                            @else
                                                <img alt="" class="w-100 rounded"
                                                     src="{{ secure_asset("images/helpers")."/MissingBookCover.jpg" }}">
                                            @endif
                                            <a role="button"
                                               class="btn btn-outline-info btn-block mt-1"
                                               href="{{ route('books.show', ['book' => $wishlist[$i]->book_id]) }}">SeeBook</a>
                                        </div>
                                    @endif
                                @endfor
                            </div>
                        </div>
                        @if(sizeof($wishlist) > 5)
                            @for($i = 0; $i < sizeof($wishlist)/5 - 1; $i++)
                                <div class="carousel-item">
                                    <div class="carousel-slide">
                                        @for($j = 0; $j < 5; $j++)
                                            @if(isset($wishlist[5 * $i + 5 + $j]))
                                                <div class="carousel-slide-item">
                                                    @if(isset($wishlist[$i]->photo))
                                                        <img alt="" class="w-100 rounded"
                                                             src="{{ secure_asset("images/books-covers")."/".$wishlist[5 * $i + 5 + $j]->photo }}">
                                                    @else
                                                        <img alt="" class="w-100 rounded"
                                                             src="{{ secure_asset("images/helpers")."/MissingBookCover.jpg" }}">
                                                    @endif
                                                    <a role="button"
                                                       class="btn btn-outline-info btn-block mt-1"
                                                       href="{{ route('books.show', ['book' => $wishlist[5 * $i + 5 + $j]->book_id]) }}">SeeBook</a>
                                                </div>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            @endfor
                        @endif
                    </div>
                </div>
            @else
                <div class="col-md-12 p-3">
                    <h3><b>@lang('dictionary.profile.no-wishlist')</b></h3>
                </div>
            @endif
        </div>
    </div>
    <div class="col-md-12 card purchase-history-div">
        <div class="my-2 p-2">
            <b>@lang('dictionary.profile.purchase_history')</b>
            <div class="float-right up-down-arrows-panel">
                <span class="caret-down float-right">
                    <i class="fas fa-caret-down fa-2x"></i>
                </span>
            </div>
        </div>
        @if(sizeof($invoices) != 0)
            <div class="purchase-history-sliding-panel">
                <div class="tr">
                    <div class="th frst-clmn">ID</div>
                    <div class="th scnd-clmn">@lang('dictionary.invoice.date')</div>
                    <div class="th thrd-clmn">@lang('dictionary.invoice.total_price')</div>
                </div>
                @foreach($invoices as $invoice_id => $arr)
                    <div class="tr data-tr">
                        <input type="hidden" value="{{ $invoice_id }}">
                        <div class="td frst-clmn">{{ $invoice_id }}</div>
                        <div class="td scnd-clmn">{{ $arr['invoice']->date }}</div>
                        <div class="td thrd-clmn">{{ $arr['price'] }}
                            <div class="float-right up-down-arrows-panel">
                            <span class="float-right">
                                <i class="fas fa-info-circle"></i>
                            </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="col-md-12 p-3">
                <h3><b>@lang('dictionary.profile.no-invoices')</b></h3>
            </div>
        @endif
    </div>
@endsection
