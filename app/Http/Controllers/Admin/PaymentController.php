<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;
use App\Models\Bill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with(['bill.subscription.user', 'bill.subscription.service'])->orderByDesc('created_at')->get();
        $bills = Bill::with(['subscription.user', 'subscription.service'])->get();
        return view('admin.pages.payment.payment', compact('payments', 'bills'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bill_id' => 'required|exists:bills,id',
            'amount' => 'required|numeric|min:0',
            'paid_at' => 'required|date',
            'method' => 'required|string|max:32',
        ], [
            'bill_id.required' => 'Bill is required',
            'amount.required' => 'Amount is required',
            'amount.numeric' => 'Amount must be a number',
            'amount.min' => 'Amount must be at least 0',
            'paid_at.required' => 'Paid At date is required',
            'method.required' => 'Payment Method is required',
        ]);

        $payment = new Payment();
        $payment->bill_id = $request->input('bill_id');
        $payment->amount = $request->input('amount');
        $payment->paid_at = $request->input('paid_at');
        $payment->method = $request->input('method');
        $payment->save();

        // update bill status if paid off
        $bill = $payment->bill;
        if ($bill && $bill->amount <= $bill->payments()->sum('amount')) {
            $bill->status = 'paid';
            $bill->paid_at = $payment->paid_at;
            $bill->save();
        }

        return redirect()->route('admin.payments.index')->with('success', 'Payment created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bill_id' => 'required|exists:bills,id',
            'amount' => 'required|numeric|min:0',
            'paid_at' => 'required|date',
            'method' => 'required|string|max:32',
        ], [
            'bill_id.required' => 'Bill is required',
            'amount.required' => 'Amount is required',
            'amount.numeric' => 'Amount must be a number',
            'amount.min' => 'Amount must be at least 0',
            'paid_at.required' => 'Paid At date is required',
            'method.required' => 'Payment Method is required',
        ]);

        $payment = Payment::findOrFail($id);
        $payment->bill_id = $request->input('bill_id');
        $payment->amount = $request->input('amount');
        $payment->paid_at = $request->input('paid_at');
        $payment->method = $request->input('method');
        $payment->save();

        // update bill status if paid off
        $bill = $payment->bill;
        if ($bill && $bill->amount <= $bill->payments()->sum('amount')) {
            $bill->status = 'paid';
            $bill->paid_at = $payment->paid_at;
            $bill->save();
        }

        return redirect()->route('admin.payments.index')->with('success', 'Payment updated successfully.');
    }

    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $bill = $payment->bill;
        $payment->delete();

        // Recheck bill status in case payment deleted
        if ($bill && $bill->amount > $bill->payments()->sum('amount')) {
            $bill->status = 'unpaid';
            $bill->paid_at = null;
            $bill->save();
        }

        return redirect()->route('admin.payments.index')->with('success', 'Payment deleted successfully.');
    }
}
