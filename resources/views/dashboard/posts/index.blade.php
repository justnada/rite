@extends('dashboard.layouts.main');

@section('container')
    <section class="section">
        <div class="section-header">
            <h1>{{ auth()->user()->name }} Posts</h1>
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
                            class="fas fa-plus"></i> Create new post</a>
                </div>
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($posts == null)
                                        <td colspan="5">You don't have any post yet</td>
                                    @else
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td width="8px">{{ $loop->iteration }}</td>
                                                <td>{{ $post->title }}</td>
                                                <td>{{ $post->category->name }}</td>
                                                <td>{{ date_format($post->updated_at, 'D, d M Y') }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        {{-- detail button --}}
                                                        <div class="block">
                                                            <a class="btn btn-info btn-action mr-1"
                                                                href="/dashboard/posts/{{ $post->slug }}"
                                                                data-toggle="tooltip" title="Detail">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </div>
                                                        {{-- edit button --}}
                                                        <div class="block">
                                                            <a class="btn btn-primary btn-action mr-1"
                                                                href="/dashboard/posts/{{ $post->slug }}/edit"
                                                                data-toggle="tooltip" title="Edit">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </div>
                                                        {{-- delete button --}}
                                                        <form action="/dashboard/posts/{{ $post->slug }}" method="POST">
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
