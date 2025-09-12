@extends('admin.layout.main')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumb start -->
        <div class="row m-1">
            <div class="col-12">
                <h4 class="main-title">Data Table</h4>
                <ul class="app-line-breadcrumbs mb-3">
                    <li class="">
                        <a class="f-s-14 f-w-500" href="#">
                            <span>
                                <i class="ph-duotone ph-table f-s-16"></i> Table
                            </span>
                        </a>
                    </li>
                    <li class="active">
                        <a class="f-s-14 f-w-500" href="#">Data Table</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Breadcrumb end -->

        <!-- Data Table start -->
        <div class="row">
            <!-- Default Datatable start -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Default Datatable</h5>
                        <p>
                            DataTables has most features enabled by default, so all
                            you need to do to use it with your own tables is to call
                            the construction function:
                            <code>$().DataTable();</code>.
                        </p>
                    </div>
                    <div class="card-body p-0">
                        <div class="app-datatable-default overflow-auto">
                            <table class="display app-data-table default-data-table" id="example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Service</th>
                                        <th>Subject</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($complaints as $complaint)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $complaint->user->name ?? '-' }}</td>
                                            <td>{{ $complaint->service->name ?? '-' }}</td>
                                            <td>{{ $complaint->subject }}</td>
                                            <td>
                                                <span
                                                    class="badge text-light-{{ $complaint->status == 'open' ? 'danger' : 'success' }}">
                                                    {{ ucfirst($complaint->status) }}
                                                </span>
                                            </td>
                                            <td>{{ $complaint->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <a href="{{ route('admin.complaints.show', $complaint->id) }}"
                                                    class="btn btn-light-info icon-btn b-r-4" title="Detail">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <form action=""
                                                    method="POST" style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-light-danger icon-btn b-r-4 delete-btn"
                                                        type="submit" title="Delete">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Default Datatable end -->

        </div>
        <!-- Data Table end -->
    </div>
@endsection
