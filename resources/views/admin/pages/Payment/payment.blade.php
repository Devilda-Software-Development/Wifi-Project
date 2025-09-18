@extends('admin.layout.main')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Payment Table</h5>
                <button class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#addPaymentModal">
                    <i class="ti ti-plus m-2"></i> Add Payment
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
                                <th>Bill Date</th>
                                <th>Amount</th>
                                <th>Method</th>
                                <th>Paid At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $payment->bill->subscription->user->name }}</td>
                                    <td>{{ $payment->bill->subscription->service->name }}</td>
                                    <td>{{ $payment->bill->bill_date }}</td>
                                    <td>{{ number_format($payment->amount, 2) }}</td>
                                    <td>{{ $payment->method }}</td>
                                    <td>{{ $payment->paid_at }}</td>
                                    <td>
                                        <button class="btn btn-light-success icon-btn b-r-4 btn-edit-payment" type="button"
                                            data-id="{{ $payment->id }}" data-bill_id="{{ $payment->bill_id }}"
                                            data-amount="{{ $payment->amount }}" data-method="{{ $payment->method }}"
                                            data-paid_at="{{ $payment->paid_at }}" data-bs-toggle="modal"
                                            data-bs-target="#editPaymentModal" title="Edit">
                                            <i class="ti ti-edit text-success"></i>
                                        </button>
                                        <form action="{{ route('admin.payments.destroy', $payment->id) }}" method="POST"
                                            style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-light-danger icon-btn b-r-4 delete-btn" type="submit"
                                                onclick="return confirm('Delete this payment?')" title="Delete">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if ($payments->isEmpty())
                                <tr>
                                    <td colspan="8" class="text-center">No payment data found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Add Payment Modal -->
        <div class="modal fade" id="addPaymentModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="{{ route('admin.payments.store') }}">
                    @csrf
                    <div class="modal-header bg-primary-800">
                        <h1 class="modal-title fs-5 text-white">Add Payment</h1>
                        <button type="button" class="fs-5 border-0 bg-none text-white" data-bs-dismiss="modal">
                            <i class="fa-solid fa-xmark fs-3"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label">Bill</label>
                            <select class="form-control" name="bill_id" required>
                                <option value="">Choose Bill</option>
                                @foreach ($bills as $bill)
                                    <option value="{{ $bill->id }}">{{ $bill->subscription->user->name }} -
                                        {{ $bill->subscription->service->name }} - {{ $bill->bill_date }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Amount</label>
                            <input type="number" min="0" class="form-control" name="amount" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Method</label>
                            <input type="text" class="form-control" name="method" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Paid At</label>
                            <input type="date" class="form-control" name="paid_at" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light-secondary" data-bs-dismiss="modal" type="button">Close</button>
                        <button class="btn btn-light-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Edit Payment Modal -->
        <div class="modal fade" id="editPaymentModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" id="formEditPayment">
                    @csrf
                    @method('PUT')
                    <div class="modal-header bg-primary-800">
                        <h1 class="modal-title fs-5 text-white">Edit Payment</h1>
                        <button type="button" class="fs-5 border-0 bg-none text-white" data-bs-dismiss="modal">
                            <i class="fa-solid fa-xmark fs-3"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label">Bill</label>
                            <select class="form-control" id="edit-bill_id" name="bill_id" required>
                                <option value="">Choose Bill</option>
                                @foreach ($bills as $bill)
                                    <option value="{{ $bill->id }}">{{ $bill->subscription->user->name }} -
                                        {{ $bill->subscription->service->name }} - {{ $bill->bill_date }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Amount</label>
                            <input type="number" min="0" class="form-control" id="edit-amount" name="amount"
                                required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Method</label>
                            <input type="text" class="form-control" id="edit-method" name="method" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Paid At</label>
                            <input type="date" class="form-control" id="edit-paid_at" name="paid_at" required>
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
            if (e.target.closest('.btn-edit-payment')) {
                const btn = e.target.closest('.btn-edit-payment');
                const id = btn.getAttribute('data-id');
                document.getElementById('edit-bill_id').value = btn.getAttribute('data-bill_id');
                document.getElementById('edit-amount').value = btn.getAttribute('data-amount');
                document.getElementById('edit-method').value = btn.getAttribute('data-method');
                document.getElementById('edit-paid_at').value = btn.getAttribute('data-paid_at');
                document.getElementById('formEditPayment').action = "{{ url('admin/payments') }}/" + id;
            }
        });
    </script>
@endpush
