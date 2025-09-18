@extends('admin.layout.main')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Detail Subscription</h5>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title mb-3"><i class="fas fa-user"></i> User</h5>
                                <p class="card-text">{{ $subscription->user->name }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title mb-3"><i class="fas fa-cogs"></i> Service</h5>
                                <p class="card-text">{{ $subscription->service->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title mb-3"><i class="fas fa-calendar-alt"></i> Start Date</h5>
                                <p class="card-text">{{ $subscription->start_date }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title mb-3"><i class="fas fa-info-circle"></i> Status</h5>
                                <span class="badge 
                                    @if($subscription->status == 'active') bg-success 
                                    @elseif($subscription->status == 'inactive') bg-secondary 
                                    @else bg-warning @endif">
                                    {{ ucfirst($subscription->status) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <h6>Tagihan Bulanan</h6>
                <div class="app-datatable-default overflow-auto">
                    <table class="display app-data-table default-data-table" id="example">
                        <thead>
                            <tr>
                                <th>Bill Date</th>
                                <th>Due Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Payments</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subscription->bills as $bill)
                                <tr>
                                    <td>{{ $bill->bill_date }}</td>
                                    <td>{{ $bill->due_date }}</td>
                                    <td>{{ number_format($bill->amount, 2) }}</td>
                                    <td>{{ $bill->status }}</td>
                                    <td>
                                        @if ($bill->payments->count())
                                            <ul>
                                                @foreach ($bill->payments as $payment)
                                                    <li>
                                                        Rp{{ number_format($payment->amount, 2) }} | {{ $payment->method }}
                                                        |
                                                        {{ $payment->paid_at }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <span class="text-danger">Belum dibayar</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            @if ($subscription->bills->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada tagihan</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <a href="{{ route('admin.subscriptions.index') }}" class="btn btn-secondary mt-2">Kembali</a>
    </div>
@endsection
