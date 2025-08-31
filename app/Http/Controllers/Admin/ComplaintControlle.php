<?php

namespace App\Http\Controllers\Admin;

use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComplaintControlle extends Controller
{
    public function index()
    {
        $complaints = Complaint::with(['user', 'service'])->get();
        return view('admin.pages.complaints', [
            'complaints' => $complaints
        ]);
    }

    public function show($id)
    {
        $complaint = Complaint::with(['user', 'service'])->findOrFail($id);
        return view('admin.pages.detail-complaint', [
            'complaint' => $complaint
        ]);
    }
}
