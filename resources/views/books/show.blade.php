@extends('general.shop')

@section('shop-scripts')
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" defer></script>
    <script type="text/javascript"
            src="{{ asset('js/books/show.js') }}" defer></script>
@endsection

@section('shop-styles')
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('css/books/show.css') }}">
@endsection

@section('books-content')
    <div class="col-md-4 card border-0">
        <div class="book-image-div h-100 card">
            <img alt="CoverPhoto"
                 class="book-image h-100"
                 src="{{ asset("images/books-covers")."/".$book->photo }}">
        </div>
        <div class="rating-bar-div card text-center">
            <!-- Rating -->
            <span class="star" name="1">☆</span>
            <span class="star" name="2">☆</span>
            <span class="star" name="3">☆</span>
            <span class="star" name="4">☆</span>
            <span class="star" name="5">☆</span>
        </div>
    </div>
    <div class="col-md-8 card border-0">
        <input name="book-id"
               type="hidden"
               value="{{ $book->id }}">
        <div class="book-info book-title">
            <b>{{ $book->title }}</b>
        </div>
        <div class="book-info">
            <b>{{ $book->author }}</b>
        </div>
        <div class="book-info">
            <b>@lang('dictionary.book.publishing_house'):</b>&nbsp;{{ $book->publishing_house }}
        </div>
        <div class="book-info">
            <b>@lang('dictionary.book.description'):</b><br>{{ $book->description }}
        </div>
        <div class="book-info">
            <b>@lang('dictionary.book.price'):</b>&nbsp;{{ $book->price }}
        </div>
        <div class="add-product-div">
            <input class="btn btn-outline-secondary m-2 give-me-a-sample-btn"
                   type="button"
                   value="@lang('dictionary.book.actions.give-me-a-sample')">
            <input class="btn btn-outline-secondary m-2 add-to-wishlist-btn"
                   type="button"
                   value="@lang('dictionary.book.actions.add-to-wishlist')">
            <input class="btn btn-outline-secondary btn-block add-to-cart-btn"
                   type="button"
                   value="@lang('dictionary.book.actions.add-to-cart')">

        </div>
    </div>

    <div class="col-md-12 card">
        <div class="mt-4 book-info book-title"><b>@lang('dictionary.general.like-these?')</b></div>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="carousel-slide">
                        <div class="carousel-slide-item">
                            <img alt="" class="w-100 rounded"
                                 src="{{ asset("images/helpers")."/MissingBookCover.jpg" }}">
                            <a role="button"
                               class="btn btn-outline-info btn-block mt-1"
                               href="{{ route('books.show', ['book' => $book->id]) }}">SeeBook</a>
                        </div>
                        <div class="carousel-slide-item">
                            <img alt="" class="w-100 rounded"
                                 src="{{ asset("images/helpers")."/MissingBookCover.jpg" }}">
                            <a role="button"
                               class="btn btn-outline-info btn-block mt-1"
                               href="{{ route('books.show', ['book' => $book->id]) }}">SeeBook</a>
                        </div>
                        <div class="carousel-slide-item">
                            <img alt="" class="w-100 rounded"
                                 src="{{ asset("images/helpers")."/MissingBookCover.jpg" }}">
                            <a role="button"
                               class="btn btn-outline-info btn-block mt-1"
                               href="{{ route('books.show', ['book' => $book->id]) }}">SeeBook</a>
                        </div>
                        <div class="carousel-slide-item">
                            <img alt="" class="w-100 rounded"
                                 src="{{ asset("images/helpers")."/MissingBookCover.jpg" }}">
                            <a role="button"
                               class="btn btn-outline-info btn-block mt-1"
                               href="{{ route('books.show', ['book' => $book->id]) }}">SeeBook</a>
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
                               href="{{ route('books.show', ['book' => $book->id]) }}">SeeBook</a>
                        </div>
                        <div class="carousel-slide-item">
                            <img alt="" class="w-100 rounded"
                                 src="{{ asset("images/helpers")."/MissingBookCover.jpg" }}">
                            <a role="button"
                               class="btn btn-outline-info btn-block mt-1"
                               href="{{ route('books.show', ['book' => $book->id]) }}">SeeBook</a>
                        </div>
                        <div class="carousel-slide-item">
                            <img alt="" class="w-100 rounded"
                                 src="{{ asset("images/helpers")."/MissingBookCover.jpg" }}">
                            <a role="button"
                               class="btn btn-outline-info btn-block mt-1"
                               href="{{ route('books.show', ['book' => $book->id]) }}">SeeBook</a>
                        </div>
                        <div class="carousel-slide-item">
                            <img alt="" class="w-100 rounded"
                                 src="{{ asset("images/helpers")."/MissingBookCover.jpg" }}">
                            <a role="button"
                               class="btn btn-outline-info btn-block mt-1"
                               href="{{ route('books.show', ['book' => $book->id]) }}">SeeBook</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 card border-0">
        <div class="mt-2 book-info book-title">
            <b>@lang('dictionary.comment.comments')</b>
            <button class="btn btn-outline-secondary float-right add-comment-btn">
                <i class="far fa-comment"></i> @lang('dictionary.comment.actions.add')
            </button>
        </div>
        <div class="comment-textarea-div">
            <textarea class="form-control" rows="5"></textarea>
            <button class="btn btn-outline-success post-comment-btn">
                <i class="far fa-paper-plane"></i> @lang('dictionary.actions.send')
            </button>
        </div>
        @for($i=1;$i<=5;$i++)
            <div class="comment-div">
                <div class="comment-approvals">
                    <div class="like-dislike-btns">
                        <button class="btn btn-outline-secondary h-50 like-comment-btn">
                            <i class="far fa-thumbs-up"></i>
                        </button>
                        <div class="comment-approvals-value p-1">25</div>
                        <button class="btn btn-outline-secondary h-50 dislike-comment-btn">
                            <i class="far fa-thumbs-down"></i>
                        </button>
                    </div>
                </div>
                <div class="pl-3 pr-3 comment-text">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur distinctio dolore molestias
                    odio placeat sequi? Cupiditate ducimus iusto minus possimus repellat. Ipsum, obcaecati, saepe!
                    Blanditiis ex fuga quis quisquam. Laborum?Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    A aperiam deleniti eius excepturi iure iusto perspiciatis temporibus vel, voluptatum. Eaque esse
                    facilis itaque laborum magnam maiores perferendis quo recusandae Lorem ipsum dolor sit amet,
                    consectetur adipisicing elit. Accusantium architecto illo ipsa labore laudantium magnam non ratione
                    tempore tenetur voluptas. Adipisci illo laudantium nostrum perspiciatis placeat sapiente sed ut
                    voluptatum.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias consequatur delectus,
                    deleniti dolores nam quam reiciendis soluta sunt unde! Accusantium atque ea eos eum harum incidunt
                    necessitatibus nesciunt pariatur suscipit!
                </div>
                <div class="comment-cmd-panel">
                    User cu nume atataicndiucnduncdiuncudinciudnciudniu
                    <div class="d-flex edit-delete-btns">
                        <button class="btn btn-outline-secondary m-1"
                                data-placement="top"
                                data-toggle="tooltip"
                                title="@lang('dictionary.actions.edit')">
                            <i class="far fa-edit"></i>
                        </button>
                        <button class="btn btn-outline-secondary m-1"
                                data-placement="top"
                                data-toggle="tooltip"
                                title="@lang('dictionary.actions.delete')">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="comment-div">
                <div class="comment-approvals">
                    <div class="like-dislike-btns">
                        <button class="btn btn-outline-secondary h-50 like-comment-btn">
                            <i class="far fa-thumbs-up"></i>
                        </button>
                        <div class="comment-approvals-value p-1">25</div>
                        <button class="btn btn-outline-secondary h-50 dislike-comment-btn">
                            <i class="far fa-thumbs-down"></i>
                        </button>
                    </div>
                </div>
                <div class="pl-3 pr-3 comment-text">
                    ore moluatur delectus, deleniti dolores nam quam reiciendis soluta sunt unde! Accusantium atque ea
                    eos eum harum incidunt necessitatibus nesciunt pariatur suscipit!
                </div>
                <div class="comment-cmd-panel">
                    User cu nume atata
                    <div class="d-flex edit-delete-btns">
                        <button class="btn btn-outline-secondary m-1 edit-comment-btn"
                                data-placement="top"
                                data-toggle="tooltip"
                                title="@lang('dictionary.actions.edit')">
                            <i class="far fa-edit"></i>
                        </button>
                        <button class="btn btn-outline-secondary m-1 delete-comment-btn"
                                data-placement="top"
                                data-toggle="tooltip"
                                title="@lang('dictionary.actions.delete')">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </div>
                </div>
            </div>
        @endfor
    </div>
@endsection
