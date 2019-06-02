@extends('general.shop')

@section('shop-scripts')
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" defer></script>
    <script type="text/javascript"
            src="{{ asset('js/profiles/show.js') }}" defer></script>
@endsection

@section('shop-styles')
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('css/profiles/show.css') }}">
@endsection

@section('scontent')
    <div class="col-md-4 card border-0">
        <div class="profile-photo-div card">
            <img alt="ProfilePhoto"
                 class="profile-photo"
                 src="{{ asset("images/helpers")."/MissingProfilePhoto.jpg" }}">
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
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="carousel-slide">
                            <div class="carousel-slide-item">
                                <img alt="" class="w-100 rounded"
                                     src="{{ asset("images/helpers")."/MissingBookCover.jpg" }}">
                                <a role="button"
                                   class="btn btn-outline-info btn-block mt-1"
                                   href="">SeeBook</a>
                            </div>
                            <div class="carousel-slide-item">
                                <img alt="" class="w-100 rounded"
                                     src="{{ asset("images/helpers")."/MissingBookCover.jpg" }}">
                                <a role="button"
                                   class="btn btn-outline-info btn-block mt-1"
                                   href="">SeeBook</a>
                            </div>
                            <div class="carousel-slide-item">
                                <img alt="" class="w-100 rounded"
                                     src="{{ asset("images/helpers")."/MissingBookCover.jpg" }}">
                                <a role="button"
                                   class="btn btn-outline-info btn-block mt-1"
                                   href="">SeeBook</a>
                            </div>
                            <div class="carousel-slide-item">
                                <img alt="" class="w-100 rounded"
                                     src="{{ asset("images/helpers")."/MissingBookCover.jpg" }}">
                                <a role="button"
                                   class="btn btn-outline-info btn-block mt-1"
                                   href="">SeeBook</a>
                            </div>
                            <div class="carousel-slide-item">
                                <img alt="" class="w-100 rounded"
                                     src="{{ asset("images/helpers")."/MissingBookCover.jpg" }}">
                                <a role="button"
                                   class="btn btn-outline-info btn-block mt-1"
                                   href="">SeeBook</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-slide">
                            <div class="carousel-slide-item">
                                <img alt="" class="w-100 rounded"
                                     src="{{ asset("images/helpers")."/MissingBookCover.jpg" }}">
                                <a role="button"
                                   class="btn btn-outline-info btn-block mt-1"
                                   href="">SeeBook</a>
                            </div>
                            <div class="carousel-slide-item">
                                <img alt="" class="w-100 rounded"
                                     src="{{ asset("images/helpers")."/MissingBookCover.jpg" }}">
                                <a role="button"
                                   class="btn btn-outline-info btn-block mt-1"
                                   href="">SeeBook</a>
                            </div>
                            <div class="carousel-slide-item">
                                <img alt="" class="w-100 rounded"
                                     src="{{ asset("images/helpers")."/MissingBookCover.jpg" }}">
                                <a role="button"
                                   class="btn btn-outline-info btn-block mt-1"
                                   href="">SeeBook</a>
                            </div>
                            <div class="carousel-slide-item">
                                <img alt="" class="w-100 rounded"
                                     src="{{ asset("images/helpers")."/MissingBookCover.jpg" }}">
                                <a role="button"
                                   class="btn btn-outline-info btn-block mt-1"
                                   href="">SeeBook</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 card purchase-history-div">
        <div class="my-2 p-2">
            <b>@lang('dictionary.profile.purchase_history')</b>
            <div class="float-right up-down-arrows-panel">
                <span class="caret-down float-right">
                    <i class="fas fa-caret-down fa-2x"></i>
                </span>
                <span class="caret-up d-none float-right">
                    <i class="fas fa-sort-up fa-2x"></i>
                </span>
            </div>
        </div>
        <div class="purchase-history-sliding-panel">
            <div class="tr">
                <div class="th frst-clmn">ID</div>
                <div class="th scnd-clmn">@lang('dictionary.invoice.date')</div>
                <div class="th thrd-clmn">@lang('dictionary.invoice.total_price')</div>
            </div>
            @for($i = 1;$i<=10;$i++)
                <div class="tr data-tr">
                    <input type="hidden" value="{{ $i }}">
                    <div class="td frst-clmn">{{ $i }}</div>
                    <div class="td scnd-clmn">20/01/2019</div>
                    <div class="td thrd-clmn">{{ $i*2019 }}
                        <div class="float-right up-down-arrows-panel">
                            <span class="caret-down float-right">
                                <i class="fas fa-caret-down fa-2x"></i>
                            </span>
                            <span class="caret-up d-none float-right">
                                <i class="fas fa-sort-up fa-2x"></i>
                            </span>
                        </div>
                    </div>
                    <div class="iframe-div">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, ab accusamus asperiores aspernatur
                        culpa cum doloremque nihil quis sed sequi similique, totam unde veritatis voluptatem voluptates.
                        Excepturi natus officiis totam.
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection
