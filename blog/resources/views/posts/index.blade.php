@extends('layout.app')

@section('title')
    List Post
@endsection

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            @include('layout.message')
            <div class="row">
                <div class="col-md-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">Recent Purchases</p>
                            <div class="header-list-table">
                                <p>Total: {{ $listPosts->count() }}</p>
                                <a href="{{ route('createPosts') }}" class="btn btn-inverse-primary btn-fw">Create</a>
                            </div>

                            <div class="table-responsive">
                                <table id="recent-purchases-listing" class="table">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>User</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Category</th>
                                        <th>Active</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($listPosts as $posts)
                                        <tr>
                                            <td>{{ $posts->id }}</td>
                                            <td><a href="{{ route('editUser', ['id' => $posts->user_id]) }}">{{ $posts->user_id }}</a></td>
                                            <td><a href="{{ route('detailPosts', ['id' => $posts->id]) }}">{{ $posts->name }}</a></td>
                                            <td>{{ $posts->title }}</td>
                                            <td>{{ $posts->category_id }}</td>
                                            <td>{{ $posts->active }}</td>
                                            <td>
                                                <a href="{{ route('editPosts', ['id' => $posts->id]) }}" class="btn btn-outline-primary">
                                                    <i class="mdi mdi-border-color"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="100%" class="dt-body-center">No data</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                                @include('layout.paginate', ['list' => $listPosts])
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
