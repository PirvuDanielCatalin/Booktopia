@extends('general.shop')

@section('shop-scripts')
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" defer></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" defer></script>
    <script type="text/javascript"
            src="{{ asset('libs/jquery.session.js') }}" defer></script>
    <script type="text/javascript"
            src="{{ asset('js/books/show.js') }}" defer></script>
@endsection

@section('shop-styles')
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('css/books/show.css') }}">
@endsection

@section('scontent')
    <div class="col-md-4 card border-0">
        <div class="book-image-div h-100 card">
            @if(isset($book->photo))
                <img alt="CoverPhoto"
                     class="book-image h-100"
                     src="{{ asset("images/books-covers")."/".$book->photo }}"
                     data-toggle="modal"
                     data-target="#showCoverModal">
            @else
                <img alt="CoverPhoto"
                     class="book-image h-100"
                     src="{{ asset("images/helpers")."/MissingBookCover.jpg" }}">
            @endif
        </div>
        <div class="rating-bar-div card text-center">
            <input type="hidden" name="user-logged-in" value="{{ ( Auth::check()) ? Auth::user()->id : '' }}">
            @for($i=1; $i<=5;$i++)
                <span class="star {{ ($i <= $rating) ? 'star-selected' : '' }}" name="{{ $i }}">☆</span>
            @endfor
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
            <b>@lang('dictionary.category.categories'):</b>&nbsp;
            @if($book->categories->first())
                @for($i = 0; $i < sizeof($book->categories)-1; $i++)
                    {{ $book->categories[$i]->name }},
                @endfor
                {{ $book->categories[sizeof($book->categories)-1]->name }}
            @endif
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
                        @for($i = 0; $i < 4; $i++)
                            <div class="carousel-slide-item">
                                @if(isset($suggested_books[$i]->photo))
                                    <img alt="CoverPhoto"
                                         class="w-100"
                                         src="{{ asset("images/books-covers")."/".$suggested_books[$i]->photo }}"
                                         data-toggle="modal"
                                         data-target="#showCoverModal">
                                @else
                                    <img alt="CoverPhoto"
                                         class="w-100"
                                         src="{{ asset("images/helpers")."/MissingBookCover.jpg" }}">
                                @endif
                                <a role="button"
                                   class="btn btn-outline-info btn-block mt-1"
                                   href="{{ route('books.show', ['book' => explode(".",$suggested_books[$i]->photo)[0]]) }}">SeeBook</a>
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-slide">
                        @for($i = 4; $i < 8; $i++)
                            <div class="carousel-slide-item">
                                @if(isset($suggested_books[$i]->photo))
                                    <img alt="CoverPhoto"
                                         class="w-100"
                                         src="{{ asset("images/books-covers")."/".$suggested_books[$i]->photo }}"
                                         data-toggle="modal"
                                         data-target="#showCoverModal">
                                @else
                                    <img alt="CoverPhoto"
                                         class="w-100"
                                         src="{{ asset("images/helpers")."/MissingBookCover.jpg" }}">
                                @endif
                                <a role="button"
                                   class="btn btn-outline-info btn-block mt-1"
                                   href="{{ route('books.show', ['book' => explode(".",$suggested_books[$i]->photo)[0]]) }}">SeeBook</a>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 card border-0">
        <div class="mt-2 book-info book-title">
            <b>@lang('dictionary.comment.comments')</b>
            @auth
                <button class="btn btn-outline-secondary float-right add-comment-btn">
                    <i class="far fa-comment"></i> @lang('dictionary.comment.actions.add')
                </button>
            @endauth
        </div>
        <div class="comment-textarea-div">
            <textarea class="form-control" rows="5"></textarea>
            <button class="btn btn-outline-success post-comment-btn">
                <i class="far fa-paper-plane"></i> @lang('dictionary.actions.send')
            </button>
        </div>
        @if(sizeof($bookcomments))
            @foreach($bookcomments as $bookcomment)
                <div class="comment-div" book-comment="{{ $bookcomment->id }}">
                    <div class="comment-approvals">
                        <div class="like-dislike-btns">
                            <button class="btn btn-outline-secondary h-50 like-comment-btn">
                                <i class="far fa-thumbs-up"></i>
                            </button>
                            <div class="comment-approvals-value p-1">{{ $bookcomment->approvals }}</div>
                            <button class="btn btn-outline-secondary h-50 dislike-comment-btn">
                                <i class="far fa-thumbs-down"></i>
                            </button>
                        </div>
                    </div>
                    <div class="pl-3 pr-3 comment-text">
                        {{ $bookcomment->text }}
                    </div>
                    <div class="comment-cmd-panel" user-id="{{ $bookcomment->user->id }}">
                        {{ $bookcomment->user->name }}
                        @auth
                            @if(Auth::user()->isAdmin() or Auth::user()->id == $bookcomment->user->id)
                                <div class="d-flex edit-delete-btns">
                                    <button book-comment="{{ $bookcomment->id }}"
                                            class="btn btn-outline-secondary m-1 save-comment-btn"
                                            data-placement="top"
                                            data-toggle="tooltip"
                                            style="display: none;"
                                            title="@lang('dictionary.actions.post')">
                                        <i class="far fa-paper-plane"></i>
                                    </button>
                                    <button book-comment="{{ $bookcomment->id }}"
                                            class="btn btn-outline-secondary m-1 edit-comment-btn"
                                            data-placement="top"
                                            data-toggle="tooltip"
                                            title="@lang('dictionary.actions.edit')">
                                        <i class="far fa-edit"></i>
                                    </button>
                                    <span data-toggle="modal" data-target="#deleteCommentModal" class="m-1">
                                        <button book-comment="{{ $bookcomment->id }}"
                                                class="btn btn-outline-secondary btn-block delete-comment-btn"
                                                data-placement="top"
                                                data-toggle="tooltip"
                                                title="@lang('dictionary.actions.delete')">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                    </span>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
            @endforeach
        @else
            <div class="p-3">
                <b>@lang('dictionary.comment.no-comments')</b>
            </div>
        @endif
        <div aria-hidden="true"
             aria-labelledby="deleteCommentModalLabel"
             class="modal fade"
             id="deleteCommentModal"
             role="dialog"
             tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteCommentModalLabel">
                            @lang('dictionary.comment.actions.delete')
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
                        <button type="button" class="btn btn-success" book-comment="" id="confirmDeleteComment">
                            @lang('dictionary.actions.delete')
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div aria-hidden="true"
             aria-labelledby="showCoverModalLabel"
             class="modal fade"
             id="showCoverModal"
             role="dialog"
             tabindex="-1">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body m-auto">
                        <img alt="CoverPhoto"
                             class="book-image h-100"
                             src="{{ asset("images/books-covers")."/".$book->photo }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
