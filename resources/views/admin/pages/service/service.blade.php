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
                        <button class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal"
                            data-bs-target="#addServiceModal">
                            <i class="ti ti-plus m-2"></i> Add Service
                        </button>
                    </div>
                    <div class="card-body p-0">
                        <div class="app-datatable-default overflow-auto">
                            <table class="display app-data-table default-data-table" id="example">
                                <thead>
                                    <tr>

                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Harga</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $service->name }}</td>
                                            <td>{{ number_format($service->price, 2) }}</td>
                                            <td>
                                                <button class="btn btn-light-success icon-btn b-r-4 btn-edit-service"
                                                    type="button" data-id="{{ $service->id }}"
                                                    data-name="{{ $service->name }}"
                                                    data-description="{{ e($service->description ?? '') }}"
                                                    data-price="{{ $service->price }}" data-bs-toggle="modal"
                                                    data-bs-target="#editServiceModal" title="Edit">
                                                    <i class="ti ti-edit text-success"></i>
                                                </button>
                                                <form action="{{ route('admin.services.destroy', $service->id) }}"
                                                    method="POST" style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-light-danger icon-btn b-r-4 delete-btn"
                                                        type="submit" onclick="return confirm('Delete this service?')"
                                                        title="Delete">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if ($services->isEmpty())
                                        <tr>
                                            <td colspan="7" class="text-center">No service data found.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Default Datatable end -->

            <!-- Add Service Modal -->
            <div class="modal fade" id="addServiceModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <form class="modal-content" method="POST" action="{{ route('admin.services.store') }}">
                        @csrf
                        <div class="modal-header bg-primary-800">
                            <h1 class="modal-title fs-5 text-white">Add Service</h1>
                            <button type="button" class="fs-5 border-0 bg-none text-white" data-bs-dismiss="modal">
                                <i class="fa-solid fa-xmark fs-3"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-2">
                                <label for="add-name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="add-name" name="name" required>
                            </div>
                            <div class="mb-2">
                                <label for="add-description" class="form-label">Description</label>
                                <textarea class="form-control" id="add-description" name="description" rows="3" required></textarea>
                            </div>
                            <div class="mb-2">
                                <label for="add-price" class="form-label">Price</label>
                                <input type="number" min="0" class="form-control" id="add-price" name="price"
                                    required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-light-secondary" data-bs-dismiss="modal" type="button">
                                Close
                            </button>
                            <button class="btn btn-light-primary" type="submit">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Edit Service Modal -->
            <div class="modal fade" id="editServiceModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <form class="modal-content" method="POST" id="formEditService">
                        @csrf
                        @method('PUT')
                        <div class="modal-header bg-primary-800">
                            <h1 class="modal-title fs-5 text-white">Edit Service</h1>
                            <button type="button" class="fs-5 border-0 bg-none text-white" data-bs-dismiss="modal">
                                <i class="fa-solid fa-xmark fs-3"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-2">
                                <label for="edit-name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="edit-name" name="name" required>
                            </div>
                            <div class="mb-2">
                                <label for="edit-description" class="form-label">Description</label>
                                <textarea class="form-control" id="edit-description" name="description" rows="3" required></textarea>
                            </div>
                            <div class="mb-2">
                                <label for="edit-price" class="form-label">Price</label>
                                <input type="number" min="0" class="form-control" id="edit-price"
                                    name="price" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-light-secondary" data-bs-dismiss="modal" type="button">
                                Close
                            </button>
                            <button class="btn btn-light-primary" type="submit">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- Data Table end -->
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('click', function(e) {
            if (e.target.closest('.btn-edit-service')) {
                const btn = e.target.closest('.btn-edit-service');
                const id = btn.getAttribute('data-id');
                const name = btn.getAttribute('data-name');
                const description = btn.getAttribute('data-description');
                const price = btn.getAttribute('data-price');

                document.getElementById('edit-name').value = name;
                document.getElementById('edit-description').value = description;
                document.getElementById('edit-price').value = price;

                document.getElementById('formEditService').action = "{{ url('admin/services') }}/" + id;
            }
        });
    </script>
@endpush
