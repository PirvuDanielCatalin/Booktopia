@extends('layouts.app')

@section('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js" defer></script>
    <script src="{{ asset('js/users/index.js') }}" defer></script>
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/users/index.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-success"></div>
                        <div class="pb-3">
                            <button type="button" class="btn btn-outline-info d-inline-block exportExcel-users-btn">
                                <i class="fas fa-file-export"></i> @lang('dictionary.user.actions.exportExcel-users')
                            </button>
                            <button type="button" class="btn btn-outline-info d-inline-block exportPDF-users-btn">
                                <i class="fas fa-file-export"></i> @lang('dictionary.user.actions.exportPDF-users')
                            </button>
                            <button type="button" class="btn btn-outline-success d-inline-block update-users-roles-btn">
                                <i class="far fa-save"></i> @lang('dictionary.user.actions.update-users-roles')
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover" id="users-datatable">
                                <thead>
                                <tr>
                                    <th class="tbl-user-id">ID:</th>
                                    <th class="tbl-user-name">@lang('dictionary.user.name')</th>
                                    <th class="tbl-user-email">@lang('dictionary.user.email')</th>
                                    <th class="tbl-user-roles">@lang('dictionary.user.role')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr class="tbl-user-info">
                                        <td class="tbl-user-id">{{ $user->id }}</td>
                                        <td class="tbl-user-name">{{ $user->name }}</td>
                                        <td class="tbl-user-email">{{ $user->email }}</td>
                                        <td class="tbl-user-roles">
                                            <select class="form-control" id="roleSelect">
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->name }}" {{ ($role->id == $users_roles[$user->id]->id) ? 'selected' : '' }}>
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection