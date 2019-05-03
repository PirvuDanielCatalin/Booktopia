@extends('layouts.app')

@section('scripts')
    <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js" defer></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" defer></script>
    <script type="text/javascript"
            src="{{ asset('js/offers/index.js') }}" defer></script>
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('css/offers/index.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="big-view">
                            <div class="pb-3">
                                <button class="btn btn-outline-primary add-book-btn">
                                    <i class="fas fa-plus"></i> @lang('dictionary.book.actions.add')
                                </button>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover" id="offers-datatable">
                                    <thead>
                                    <tr>
                                        <th class="tbl-user-id">ID:</th>
                                        <th class="tbl-user-name">@lang('dictionary.user.name')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr class="tbl-user-info">
                                            <td class="tbl-user-id">{{ $user->id }}</td>
                                            <td class="tbl-user-name">{{ $user->name }}</td>
                                            <td class="tbl-user-email">{{ $user->email }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="small-view">
                            <img src="{{ asset("images/views-right-panels")."/Users_Right_Panel.png" }}"
                                 alt="UsersPageRightPanel" class="users_page_right_panel_img">
                            <div class="users_page_right_panel">
                                <div class="form">
                                    <div class="row">
                                        <input type="hidden" class="user_id" value="">

                                        <div class="col-md-12 form-input update-user-role-div p-2">
                                            <label for="name">@lang('dictionary.user.name')</label>
                                            <input type="text" name="name"
                                                   class="form-control"
                                                   value="" disabled>
                                        </div>

                                        <div class="col-md-12 form-input update-user-role-div p-2">
                                            <label for="email">@lang('dictionary.user.email')</label>
                                            <input type="text" name="email"
                                                   class="form-control"
                                                   value="" disabled>
                                        </div>

                                        <div class="col-md-12 form-input update-user-role-div p-2">
                                            <label for="role">@lang('dictionary.user.role')</label>
                                            <select class="form-control" id="roleSelect">
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->name }}">
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-12 form-input update-user-role-div p-2">
                                            <button class="btn btn-success update-user-role-btn w-100">
                                                @lang('dictionary.actions.save')
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