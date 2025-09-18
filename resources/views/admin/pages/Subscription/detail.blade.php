@extends('admin.layout.main')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Detail Subscription</h5>
            </div>
            <div class="card-body">
                <h6>User: {{ $subscription->user->name }}</h6>
                <h6>Service: {{ $subscription->service->name }}</h6>
                <h6>Start Date: {{ $subscription->start_date }}</h6>
                <h6>Status: {{ $subscription->status }}</h6>
                <hr>
                <h6>Tagihan Bulanan</h6>
                <table class="table">
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
                                                    Rp{{ number_format($payment->amount, 2) }} | {{ $payment->method }} |
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
        <a href="{{ route('admin.subscriptions.index') }}" class="btn btn-secondary mt-2">Kembali</a>
    </div>
@endsection
