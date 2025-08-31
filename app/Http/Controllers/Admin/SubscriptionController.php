<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::with(['user', 'service'])->get();
        return view('admin.pages.subscriptions', [
            'subscriptions' => $subscriptions
        ]);
    }
}
