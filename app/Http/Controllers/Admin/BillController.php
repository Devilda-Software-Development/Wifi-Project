<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bill;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::with(['subscription.user', 'subscription.service', 'payments'])->orderByDesc('created_at')->get();
        $subscriptions = Subscription::with(['user', 'service'])->get();
        return view('admin.pages.bill.bill', compact('bills', 'subscriptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subscription_id' => 'required|exists:subscriptions,id',
            'bill_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:bill_date',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|string|max:32',
        ], [
            'subscription_id.required' => 'Subscription is required',
            'bill_date.required' => 'Bill Date is required',
            'due_date.required' => 'Due Date is required',
            'amount.required' => 'Amount is required',
            'amount.numeric' => 'Amount must be a number',
            'amount.min' => 'Amount must be at least 0',
            'status.required' => 'Status is required',
        ]);

        $bill = new Bill();
        $bill->subscription_id = $request->input('subscription_id');
        $bill->bill_date = $request->input('bill_date');
        $bill->due_date = $request->input('due_date');
        $bill->amount = $request->input('amount');
        $bill->status = $request->input('status');
        $bill->paid_at = $request->input('paid_at', null);
        $bill->save();

        return redirect()->route('admin.bills.index')->with('success', 'Bill created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'subscription_id' => 'required|exists:subscriptions,id',
            'bill_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:bill_date',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|string|max:32',
        ], [
            'subscription_id.required' => 'Subscription is required',
            'bill_date.required' => 'Bill Date is required',
            'due_date.required' => 'Due Date is required',
            'amount.required' => 'Amount is required',
            'amount.numeric' => 'Amount must be a number',
            'amount.min' => 'Amount must be at least 0',
            'status.required' => 'Status is required',
        ]);

        $bill = Bill::findOrFail($id);
        $bill->subscription_id = $request->input('subscription_id');
        $bill->bill_date = $request->input('bill_date');
        $bill->due_date = $request->input('due_date');
        $bill->amount = $request->input('amount');
        $bill->status = $request->input('status');
        $bill->paid_at = $request->input('paid_at', null);
        $bill->save();

        return redirect()->route('admin.bills.index')->with('success', 'Bill updated successfully.');
    }

    public function destroy($id)
    {
        $bill = Bill::findOrFail($id);
        $bill->delete();

        return redirect()->route('admin.bills.index')->with('success', 'Bill deleted successfully.');
    }

    // Generate Monthly Bills
    public function generateMonthlyBills()
    {
        $now = Carbon::now();
        $subs = Subscription::where('status', 'active')->get();

        foreach ($subs as $sub) {
            $billDate = Carbon::parse($sub->start_date)
                ->day($now->day)
                ->month($now->month)
                ->year($now->year);

            $existing = Bill::where('subscription_id', $sub->id)
                ->whereMonth('bill_date', $now->month)
                ->whereYear('bill_date', $now->year)
                ->first();

            if (!$existing) {
                Bill::create([
                    'subscription_id' => $sub->id,
                    'bill_date' => $billDate,
                    'due_date' => $billDate->copy()->addDays(7),
                    'amount' => $sub->service->price,
                    'status' => 'unpaid',
                ]);
            }
        }

        return redirect()->route('admin.bills.index')->with('success', 'Monthly bills generated!');
    }
}
