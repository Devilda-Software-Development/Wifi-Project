@extends('admin.layout.main')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumb start -->
        <div class="row m-1">
            <div class="col-12">
                <h4 class="main-title">Detail Complaint</h4>
                <ul class="app-line-breadcrumbs mb-3">
                    <li>
                        <a class="f-s-14 f-w-500" href="{{ route('admin.complaints.index') }}">
                            <span>
                                <i class="ph-duotone ph-table f-s-16"></i> Complaint Table
                            </span>
                        </a>
                    </li>
                    <li class="active">
                        <a class="f-s-14 f-w-500" href="#">Detail Complaint</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb end -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Complaint Info</h5>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-3">User</dt>
                            <dd class="col-sm-9">{{ $complaint->user->name ?? '-' }}</dd>
                            <dt class="col-sm-3">Service</dt>
                            <dd class="col-sm-9">{{ $complaint->service->name ?? '-' }}</dd>
                            <dt class="col-sm-3">Subject</dt>
                            <dd class="col-sm-9">{{ $complaint->subject }}</dd>
                            <dt class="col-sm-3">Status</dt>
                            <dd class="col-sm-9">
                                <span class="badge text-light-{{ $complaint->status == 'open' ? 'danger' : 'success' }}">
                                    {{ ucfirst($complaint->status) }}
                                </span>
                            </dd>
                            <dt class="col-sm-3">Date</dt>
                            <dd class="col-sm-9">{{ $complaint->created_at->format('Y-m-d H:i:s') }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detail Complaint Conversation -->
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Complaint Conversation</h5>
                    </div>
                    <div class="card-body">
                        @if (isset($complaint->detailComplaint) && $complaint->detailComplaint->count())
                            <ul class="list-group mb-3">
                                @foreach ($complaint->detailComplaint as $detail)
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between">
                                            <strong>{{ $detail->user->name ?? 'Unknown' }}</strong>
                                            <span class="text-muted">{{ $detail->created_at->format('Y-m-d H:i') }}</span>
                                        </div>
                                        <div>{{ $detail->message }}</div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted">No conversation found.</p>
                        @endif

                        <!-- Form to add new message -->
                        <form action="{{ route('admin.complaints.addMessage', $complaint->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="message" class="form-label"><strong>Add Message</strong></label>
                                <textarea class="form-control" id="message" name="message" rows="3" required>{{ old('message') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                        <!-- End Form -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Detail Complaint Conversation -->
    </div>
@endsection
