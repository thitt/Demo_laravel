@extends('layout.app')

@section('title')
    List User
@endsection

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">Recent Purchases</p>
                            <div class="header-list-table">
                                <p>Total: {{ $count }}</p>
                                <a href="{{ route('createUser') }}" class="btn btn-inverse-primary btn-fw">Create</a>
                            </div>

                            <div class="table-responsive">
                                <table id="recent-purchases-listing" class="table">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Avatar</th>
                                        <th>User Name</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Address</th>
                                        <th>Membership</th>
                                        <th>Active</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($listUser as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td><img src="{{ asset($user->url_avatar) }}" alt=""></td>
                                            <td>{{ $user->name }}</td>
                                            <td><a href="{{ route('editUser', $user->id) }}">{{ $user->first_name . ' ' . $user->last_name }}</a></td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone_number }}</td>
                                            <td>{{ $user->address }}</td>
                                            <td>{{ $user->membership }}</td>
                                            <td>{{ $user->active }}</td>
                                            <td>
                                                <button type="button"
                                                        class="btn btn-outline-danger icon-delete-user"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#delete-modal"
                                                        data-id="{{ $user->id }}"
                                                >
                                                    <i class="mdi mdi-delete"></i>
                                                </button>
                                            </td>
                                            <td>
                                                <a href="{{ route('sendMailUser', ['id' => $user->id]) }}" class="btn btn-outline-primary">
                                                    <i class="mdi mdi-send"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="100%" class="dt-body-center">Không có dữ liệu</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                                @include('layout.paginate', ['list' => $listUser])
                            </div>
                            <div class="modal demo-modal" id="delete-modal">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Modal delete</h5>
                                            <button type="button" class="close">
                                                <span aria-hidden="true" data-bs-dismiss="modal">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Do you want to delete this record?</p>
                                            <input type="hidden" id="id-user-delete">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger btn-delete-user">Delete</button>
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
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

@section('script')
    <script src="{{ asset('js/user.js') }}" type="module"></script>
@endsection
