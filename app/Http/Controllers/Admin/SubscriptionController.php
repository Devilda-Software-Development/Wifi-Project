<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subscription;
use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::with(['user', 'service'])->orderByDesc('created_at')->get();
        $users = User::all();
        $services = Service::all();
        return view('admin.pages.subscription.subscription', compact('subscriptions', 'users', 'services'));
    }

    public function detail($id)
    {
        $subscription = Subscription::with([
            'user',
            'service',
            'bills.payments'
        ])->findOrFail($id);

        return view('admin.pages.subscription.detail', compact('subscription'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'start_date' => 'required|date',
            'status' => 'required|string|max:32',
        ], [
            'user_id.required' => 'User is required',
            'service_id.required' => 'Service is required',
            'start_date.required' => 'Start Date is required',
            'status.required' => 'Status is required',
        ]);

        $subscription = new Subscription();
        $subscription->user_id = $request->input('user_id');
        $subscription->service_id = $request->input('service_id');
        $subscription->start_date = $request->input('start_date');
        $subscription->status = $request->input('status');
        $subscription->save();

        return redirect()->route('admin.subscriptions.index')->with('success', 'Subscription created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'start_date' => 'required|date',
            'status' => 'required|string|max:32',
        ], [
            'user_id.required' => 'User is required',
            'service_id.required' => 'Service is required',
            'start_date.required' => 'Start Date is required',
            'status.required' => 'Status is required',
        ]);

        $subscription = Subscription::findOrFail($id);
        $subscription->user_id = $request->input('user_id');
        $subscription->service_id = $request->input('service_id');
        $subscription->start_date = $request->input('start_date');
        $subscription->status = $request->input('status');
        $subscription->save();

        return redirect()->route('admin.subscriptions.index')->with('success', 'Subscription updated successfully.');
    }

    public function destroy($id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();

        return redirect()->route('admin.subscriptions.index')->with('success', 'Subscription deleted successfully.');
    }
}
