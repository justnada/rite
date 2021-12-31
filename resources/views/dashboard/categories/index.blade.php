@extends('dashboard.layouts.main');

@section('container')
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif
                <div class="d-flex justify-content-end mb-4">
                    <a href="/dashboard/posts/create" class="btn btn-icon icon-left btn-primary"><i
                            class="fas fa-plus"></i> Create new category</a>
                </div>
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($categories == null)
                                        <td colspan="5">You don't have any post yet</td>
                                    @else
                                        @foreach ($categories as $category)
                                            <tr class="text-center">
                                                <td width="8px">{{ $loop->iteration }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        {{-- detail button --}}
                                                        <div class="block mt-2">
                                                            <a class="btn btn-info btn-action mr-1"
                                                                href="/dashboard/categories/{{ $category->slug }}"
                                                                data-toggle="tooltip" title="Detail">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </div>
                                                        {{-- edit button --}}
                                                        <div class="block mt-2">
                                                            <a class="btn btn-primary btn-action mr-1"
                                                                href="/dashboard/categories/{{ $category->slug }}/edit"
                                                                data-toggle="tooltip" title="Edit">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </div>
                                                        {{-- delete button --}}
                                                        <form action="/dashboard/categories/{{ $category->slug }}"
                                                            class="mt-2" method="POST">
                                                            @method('delete')
                                                            @csrf
                                                            <button id="delete" class="btn btn-danger btn-action"
                                                                data-toggle="tooltip" title="Delete"
                                                                onclick="return confirm('Are you sure to delete this?')">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<script>
    $('#delete').fireModal(submit);
</script>
