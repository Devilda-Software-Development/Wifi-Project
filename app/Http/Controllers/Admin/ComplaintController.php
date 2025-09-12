<?php

namespace App\Http\Controllers\Admin;

use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Models\DetailComplaint;
use App\Http\Controllers\Controller;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::with(['user', 'service'])->get();
        return view('admin.pages.complaint.complaint', [
            'complaints' => $complaints
        ]);
    }

    public function show($id)
    {
        $complaint = Complaint::with(['user', 'service'])->findOrFail($id);
        return view('admin.pages.complaint.detail', [
            'complaint' => $complaint
        ]);
    }

    public function addMessage(Request $request, $id)
    {
        $request->validate([
            'message' => 'required|string'
        ]);

        $complaint = Complaint::findOrFail($id);

        DetailComplaint::create([
            'complaint_id' => $complaint->id,
            'user_id' => auth()->id(),
            'message' => $request->message,
        ]);

        return redirect()->route('admin.complaints.show', $id)->with('success', 'Message sent successfully.');
    }
}
