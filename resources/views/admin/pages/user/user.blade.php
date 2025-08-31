@extends('admin.layout.main')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumb start -->
        <div class="row m-1">
            <div class="col-12">
                <h4 class="main-title">Data Table</h4>
                <ul class="app-line-breadcrumbs mb-3">
                    <li>
                        <a class="f-s-14 f-w-500" href="#">
                            <span>
                                <i class="ph-duotone ph-table f-s-16"></i> Table
                            </span>
                        </a>
                    </li>
                    <li class="active">
                        <a class="f-s-14 f-w-500" href="#">Data Table</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb end -->

        <!-- Data Table start -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Default Datatable</h5>
                        <p>
                            DataTables has most features enabled by default, so all
                            you need to do to use it with your own tables is to call
                            the construction function:
                            <code>$().DataTable();</code>.
                        </p>
                        <button class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#addUserModal">
                            <i class="ti ti-plus"></i> Add User
                        </button>
                    </div>
                    <div class="card-body p-0">
                        <div class="app-datatable-default overflow-auto">
                            <table class="display app-data-table default-data-table" id="example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <!-- Edit button -->
                                                <button class="btn btn-light-success icon-btn b-r-4 btn-edit-user"
                                                    type="button" data-id="{{ $user->id }}"
                                                    data-name="{{ $user->name }}" data-email="{{ $user->email }}"
                                                    data-bs-toggle="modal" data-bs-target="#editUserModal" title="Edit">
                                                    <i class="ti ti-edit text-success"></i>
                                                </button>
                                                <!-- Delete button -->
                                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                                    style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-light-danger icon-btn b-r-4 delete-btn"
                                                        type="submit" onclick="return confirm('Delete this user?')"
                                                        title="Delete">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if ($users->isEmpty())
                                        <tr>
                                            <td colspan="7" class="text-center">No users found.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Default Datatable end -->

            <!-- Add User Modal -->
            <div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <form class="modal-content" method="POST" action="{{ route('admin.users.store') }}">
                        @csrf
                        <div class="modal-header bg-primary-800">
                            <h1 class="modal-title fs-5 text-white">Add User</h1>
                            <button type="button" class="fs-5 border-0 bg-none text-white" data-bs-dismiss="modal">
                                <i class="fa-solid fa-xmark fs-3"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-2">
                                <label for="add-name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="add-name" name="name" required>
                            </div>
                            <div class="mb-2">
                                <label for="add-email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="add-email" name="email" required>
                            </div>
                            <div class="mb-2">
                                <label for="add-password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="add-password" name="password" required>
                            </div>
                            <div class="mb-2">
                                <label for="add-password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="add-password_confirmation"
                                    name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-light-secondary" data-bs-dismiss="modal" type="button">Close</button>
                            <button class="btn btn-light-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Edit User Modal -->
            <div class="modal fade" id="editUserModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <form class="modal-content" method="POST" id="formEditUser">
                        @csrf
                        @method('PUT')
                        <div class="modal-header bg-primary-800">
                            <h1 class="modal-title fs-5 text-white">Edit User</h1>
                            <button type="button" class="fs-5 border-0 bg-none text-white" data-bs-dismiss="modal">
                                <i class="fa-solid fa-xmark fs-3"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-2">
                                <label for="edit-name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="edit-name" name="name" required>
                            </div>
                            <div class="mb-2">
                                <label for="edit-email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="edit-email" name="email" required>
                            </div>
                            <div class="mb-2">
                                <label for="edit-password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="edit-password" name="password"
                                    placeholder="Leave blank to keep current password">
                            </div>
                            <div class="mb-2">
                                <label for="edit-password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="edit-password_confirmation"
                                    name="password_confirmation" placeholder="Leave blank to keep current password">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-light-secondary" data-bs-dismiss="modal" type="button">Close</button>
                            <button class="btn btn-light-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- Data Table end -->
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('click', function(e) {
            if (e.target.closest('.btn-edit-user')) {
                const btn = e.target.closest('.btn-edit-user');
                const id = btn.getAttribute('data-id');
                const name = btn.getAttribute('data-name');
                const email = btn.getAttribute('data-email');

                document.getElementById('edit-name').value = name;
                document.getElementById('edit-email').value = email;
                document.getElementById('edit-password').value = "";
                document.getElementById('edit-password_confirmation').value = "";

                document.getElementById('formEditUser').action = "{{ url('admin/users') }}/" + id;
            }
        });
    </script>
@endpush
