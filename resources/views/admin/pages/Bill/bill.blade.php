@extends('admin.layout.main')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Bill Table</h5>
                <button class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#addBillModal">
                    <i class="ti ti-plus m-2"></i> Add Bill
                </button>
                <form class="d-inline" method="POST" action="{{ route('admin.bills.generate') }}">
                    @csrf
                    <button class="btn btn-warning btn-sm mb-2" type="submit">
                        <i class="ti ti-calendar m-2"></i> Generate Monthly Bills
                    </button>
                </form>
            </div>
            <div class="card-body p-0">
                <div class="app-datatable-default overflow-auto">
                    <table class="display app-data-table default-data-table" id="example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Service</th>
                                <th>Bill Date</th>
                                <th>Due Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bills as $bill)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $bill->subscription->user->name }}</td>
                                    <td>{{ $bill->subscription->service->name }}</td>
                                    <td>{{ $bill->bill_date }}</td>
                                    <td>{{ $bill->due_date }}</td>
                                    <td>{{ number_format($bill->amount, 2) }}</td>
                                    <td>{{ $bill->status }}</td>
                                    <td>
                                        <button class="btn btn-light-success icon-btn b-r-4 btn-edit-bill" type="button"
                                            data-id="{{ $bill->id }}"
                                            data-subscription_id="{{ $bill->subscription_id }}"
                                            data-bill_date="{{ $bill->bill_date }}" data-due_date="{{ $bill->due_date }}"
                                            data-amount="{{ $bill->amount }}" data-status="{{ $bill->status }}"
                                            data-bs-toggle="modal" data-bs-target="#editBillModal" title="Edit">
                                            <i class="ti ti-edit text-success"></i>
                                        </button>
                                        <form action="{{ route('admin.bills.destroy', $bill->id) }}" method="POST"
                                            style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-light-danger icon-btn b-r-4 delete-btn" type="submit"
                                                onclick="return confirm('Delete this bill?')" title="Delete">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if ($bills->isEmpty())
                                <tr>
                                    <td colspan="8" class="text-center">No bill data found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Add Bill Modal -->
        <div class="modal fade" id="addBillModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="{{ route('admin.bills.store') }}">
                    @csrf
                    <div class="modal-header bg-primary-800">
                        <h1 class="modal-title fs-5 text-white">Add Bill</h1>
                        <button type="button" class="fs-5 border-0 bg-none text-white" data-bs-dismiss="modal">
                            <i class="fa-solid fa-xmark fs-3"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label">Subscription</label>
                            <select class="form-control" name="subscription_id" required>
                                <option value="">Choose Subscription</option>
                                @foreach ($subscriptions as $sub)
                                    <option value="{{ $sub->id }}">{{ $sub->user->name }} -
                                        {{ $sub->service->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Bill Date</label>
                            <input type="date" class="form-control" name="bill_date" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Due Date</label>
                            <input type="date" class="form-control" name="due_date" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Amount</label>
                            <input type="number" min="0" class="form-control" name="amount" required>
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

        <!-- Edit Bill Modal -->
        <div class="modal fade" id="editBillModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" id="formEditBill">
                    @csrf
                    @method('PUT')
                    <div class="modal-header bg-primary-800">
                        <h1 class="modal-title fs-5 text-white">Edit Bill</h1>
                        <button type="button" class="fs-5 border-0 bg-none text-white" data-bs-dismiss="modal">
                            <i class="fa-solid fa-xmark fs-3"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label">Subscription</label>
                            <select class="form-control" id="edit-subscription_id" name="subscription_id" required>
                                <option value="">Choose Subscription</option>
                                @foreach ($subscriptions as $sub)
                                    <option value="{{ $sub->id }}">{{ $sub->user->name }} -
                                        {{ $sub->service->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Bill Date</label>
                            <input type="date" class="form-control" id="edit-bill_date" name="bill_date" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Due Date</label>
                            <input type="date" class="form-control" id="edit-due_date" name="due_date" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Amount</label>
                            <input type="number" min="0" class="form-control" id="edit-amount" name="amount"
                                required>
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
            if (e.target.closest('.btn-edit-bill')) {
                const btn = e.target.closest('.btn-edit-bill');
                const id = btn.getAttribute('data-id');
                document.getElementById('edit-subscription_id').value = btn.getAttribute('data-subscription_id');
                document.getElementById('edit-bill_date').value = btn.getAttribute('data-bill_date');
                document.getElementById('edit-due_date').value = btn.getAttribute('data-due_date');
                document.getElementById('edit-amount').value = btn.getAttribute('data-amount');
                document.getElementById('edit-status').value = btn.getAttribute('data-status');
                document.getElementById('formEditBill').action = "{{ url('admin/bills') }}/" + id;
            }
        });
    </script>
@endpush
