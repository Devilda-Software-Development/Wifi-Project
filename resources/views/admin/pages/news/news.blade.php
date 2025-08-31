@extends('admin.layout.main')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumb start -->
        <div class="row m-1">
            <div class="col-12">
                <h4 class="main-title">News Table</h4>
                <ul class="app-line-breadcrumbs mb-3">
                    <li>
                        <a class="f-s-14 f-w-500" href="#">
                            <span>
                                <i class="ph-duotone ph-table f-s-16"></i> Table
                            </span>
                        </a>
                    </li>
                    <li class="active">
                        <a class="f-s-14 f-w-500" href="#">News Data Table</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb end -->

        <!-- Data Table start -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>News List</h5>
                        <p>
                            List of all news data. You can add, edit, or delete news here.
                        </p>
                        <a href="#" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal"
                            data-bs-target="#addNewsModal">
                            <i class="ti ti-plus"></i> Add News
                        </a>
                    </div>
                    <div class="card-body p-0">
                        <div class="app-datatable-default overflow-auto">
                            <table class="display app-data-table default-data-table" id="example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Content</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($news as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->slug }}</td>
                                            <td>{{ Str::limit(strip_tags($item->content), 50) }}</td>
                                            <td>{{ $item->created_at->format('Y-m-d H:i') }}</td>
                                            <td>
                                                <!-- Edit button (open modal) -->
                                                <button class="btn btn-light-success icon-btn b-r-4 btn-edit-news"
                                                    type="button" data-id="{{ $item->id }}"
                                                    data-title="{{ $item->title }}"
                                                    data-content="{{ htmlspecialchars($item->content) }}"
                                                    data-bs-toggle="modal" data-bs-target="#editNewsModal">
                                                    <i class="ti ti-edit text-success"></i>
                                                </button>
                                                <!-- Delete Form -->
                                                <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST"
                                                    style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-light-danger icon-btn b-r-4 delete-btn"
                                                        type="submit" onclick="return confirm('Delete this news?')">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if ($news->isEmpty())
                                        <tr>
                                            <td colspan="6" class="text-center">No news data found.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        {{-- Pagination (if using paginate) --}}
                        {{-- {!! $news->links() !!} --}}
                    </div>
                </div>
            </div>

            <!-- Add News Modal -->
            <div class="modal fade" id="addNewsModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <form class="modal-content" method="POST" action="{{ route('admin.news.store') }}">
                        @csrf
                        <div class="modal-header bg-primary-800">
                            <h1 class="modal-title fs-5 text-white">Add News</h1>
                            <button type="button" class="fs-5 border-0 bg-none text-white" data-bs-dismiss="modal">
                                <i class="fa-solid fa-xmark fs-3"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-2">
                                <label for="add-title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="add-title" name="title" required>
                            </div>
                            <div class="mb-2">
                                <label for="add-content" class="form-label">Content</label>
                                <textarea class="form-control" id="add-content" name="content" rows="4" required></textarea>
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

            <!-- Edit News Modal -->
            <div class="modal fade" id="editNewsModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <form class="modal-content" method="POST" id="formEditNews">
                        @csrf
                        @method('PUT')
                        <div class="modal-header bg-primary-800">
                            <h1 class="modal-title fs-5 text-white">Edit News</h1>
                            <button type="button" class="fs-5 border-0 bg-none text-white" data-bs-dismiss="modal">
                                <i class="fa-solid fa-xmark fs-3"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-2">
                                <label for="edit-title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="edit-title" name="title" required>
                            </div>
                            <div class="mb-2">
                                <label for="edit-content" class="form-label">Content</label>
                                <textarea class="form-control" id="edit-content" name="content" rows="4" required></textarea>
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
        // Set edit modal fields & form action dynamically
        document.querySelectorAll('.btn-edit-news').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const title = this.getAttribute('data-title');
                const content = this.getAttribute('data-content');

                document.getElementById('edit-title').value = title;
                document.getElementById('edit-content').value = content;
                document.getElementById('formEditNews').action = "{{ url('admin/news') }}/" + id;
            });
        });
    </script>
@endpush
