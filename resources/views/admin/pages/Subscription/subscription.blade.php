@extends('admin.layout.main')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumb, etc. bisa disalin dari contoh service -->
        <div class="card">
            <div class="card-header">
                <h5>Subscriptions Table</h5>
                <button class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#addSubscriptionModal">
                    <i class="ti ti-plus m-2"></i> Add Subscription
                </button>
            </div>
            <div class="card-body p-0">
                <div class="app-datatable-default overflow-auto">
                    <table class="display app-data-table default-data-table" id="example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Service</th>
                                <th>Start Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subscriptions as $subscription)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $subscription->user->name }}</td>
                                    <td>{{ $subscription->service->name }}</td>
                                    <td>{{ $subscription->start_date }}</td>
                                    <td>{{ $subscription->status }}</td>
                                    <td>
                                        <a href="{{ route('admin.subscriptions.detail', $subscription->id) }}"
                                            class="btn btn-light-info icon-btn b-r-4" title="Detail">
                                            <i class="ti ti-info-circle text-info"></i>
                                        </a>
                                        <button class="btn btn-light-success icon-btn b-r-4 btn-edit-subscription"
                                            type="button" data-id="{{ $subscription->id }}"
                                            data-user_id="{{ $subscription->user_id }}"
                                            data-service_id="{{ $subscription->service_id }}"
                                            data-start_date="{{ $subscription->start_date }}"
                                            data-status="{{ $subscription->status }}" data-bs-toggle="modal"
                                            data-bs-target="#editSubscriptionModal" title="Edit">
                                            <i class="ti ti-edit text-success"></i>
                                        </button>
                                        <form action="{{ route('admin.subscriptions.destroy', $subscription->id) }}"
                                            method="POST" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-light-danger icon-btn b-r-4 delete-btn" type="submit"
                                                onclick="return confirm('Delete this subscription?')" title="Delete">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if ($subscriptions->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center">No subscription data found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Add Subscription Modal -->
        <div class="modal fade" id="addSubscriptionModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="{{ route('admin.subscriptions.store') }}">
                    @csrf
                    <div class="modal-header bg-primary-800">
                        <h1 class="modal-title fs-5 text-white">Add Subscription</h1>
                        <button type="button" class="fs-5 border-0 bg-none text-white" data-bs-dismiss="modal">
                            <i class="fa-solid fa-xmark fs-3"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label">User</label>
                            <select class="form-control" name="user_id" required>
                                <option value="">Choose User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Service</label>
                            <select class="form-control" name="service_id" required>
                                <option value="">Choose Service</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Start Date</label>
                            <input type="date" class="form-control" name="start_date" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Status</label>
                            <input type="text" class="form-control" name="status" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light-secondary" data-bs-dismiss="modal" type="button">Close</button>
                        <button class="btn btn-light-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Edit Subscription Modal -->
        <div class="modal fade" id="editSubscriptionModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" id="formEditSubscription">
                    @csrf
                    @method('PUT')
                    <div class="modal-header bg-primary-800">
                        <h1 class="modal-title fs-5 text-white">Edit Subscription</h1>
                        <button type="button" class="fs-5 border-0 bg-none text-white" data-bs-dismiss="modal">
                            <i class="fa-solid fa-xmark fs-3"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label">User</label>
                            <select class="form-control" id="edit-user_id" name="user_id" required>
                                <option value="">Choose User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Service</label>
                            <select class="form-control" id="edit-service_id" name="service_id" required>
                                <option value="">Choose Service</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="edit-start_date" name="start_date" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Status</label>
                            <input type="text" class="form-control" id="edit-status" name="status" required>
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
@endsection

@push('scripts')
    <script>
        document.addEventListener('click', function(e) {
            if (e.target.closest('.btn-edit-subscription')) {
                const btn = e.target.closest('.btn-edit-subscription');
                const id = btn.getAttribute('data-id');
                document.getElementById('edit-user_id').value = btn.getAttribute('data-user_id');
                document.getElementById('edit-service_id').value = btn.getAttribute('data-service_id');
                document.getElementById('edit-start_date').value = btn.getAttribute('data-start_date');
                document.getElementById('edit-status').value = btn.getAttribute('data-status');
                document.getElementById('formEditSubscription').action = "{{ url('admin/subscriptions') }}/" + id;
            }
        });
    </script>
@endpush
