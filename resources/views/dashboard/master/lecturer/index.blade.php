@extends('dashboard.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $title }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            @foreach ($breadcrumb as $key => $b)
                                <li class="breadcrumb-item @if ($loop->last) active @endif">
                                    @if(!$loop->last)
                                        <a href="{{ $key }}">
                                    @endif
                                    {{ $b }}
                                    @if(!$loop->last)
                                        </a>
                                    @endif
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        {{-- <form action="/dashboard/master/lecturers" class="row" id="filter"> --}}
                        <div class="row">
                            <div class="col-4 d-flex">
                                {{-- <div class="input-group mb-3"> --}}
                                <div class="input-group mb-3 d-block">
                                    <form action="/dashboard/master/lecturers" class="d-flex">
                                        @if(request('orderBy'))
                                            <input type="hidden" name="orderBy" value="{{ request('orderBy') }}">
                                        @endif
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Search lecturer"
                                            name="search"
                                            value="{{ request('search') }}"
                                        >
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-5">
                                {{-- filter tmbhn --}}
                            </div>
                            <div class="col-3">
                                <div>
                                    <form action="/dashboard/master/lecturers" id="filter">
                                        @if(request('search')!=null)
                                            <input type="hidden" name="search" value="{{ request('search') }}">
                                        @endif
                                        <select
                                            class="form-control"
                                            name="orderBy"
                                            class="float-right"
                                            onchange="submitFilter()"
                                        >
                                        <option value="asc" @if(request('orderBy') == "asc") selected @endif >Terlama</option>
                                        <option value="desc" @if(request('orderBy') == "desc") selected @endif >Terbaru</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- </form> --}}
                        <table id="tableMasterLecturer" class="table table-bordered table-striped w-7">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIDN</th>
                                    <th>Name</th>
                                    <th>Birth</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Created_at</th>
                                    <th>
                                        <div class="text-right">
                                            Action
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($lecturers->count())
                                    @foreach ($lecturers as $lecturer)
                                        <tr>
                                            <td>{{ $loop->iteration + $lecturers->firstItem() - 1 }}</td>
                                            <td>{{ $lecturer->nidn }}</td>
                                            <td>{{ $lecturer->name }}</td>
                                            <td>{{ $lecturer->pob }}, {{ date("d M Y",strtotime($lecturer->dob)) }}</td>
                                            <td>{{ $lecturer->phone }}</td>
                                            <td>{{ $lecturer->address }}</td>
                                            <td>{{ $lecturer->created_at->diffForHumans() }}</td>
                                            <td>
                                                <div class="float-right">
                                                    {{-- <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"> --}}
                                                    <a href="#" class="badge bg-info p-2">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    {{-- <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"> --}}
                                                    <a href="#" class="badge bg-warning p-2">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    {{-- <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline"> --}}
                                                    <form action="#" method="post" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="badge bg-danger border-0 p-2" onclick="return confirm('Are you sure?')">
                                                        <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7">
                                            <h5 class="text-center p-2">No Lecturer found.</h5>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    <div class="row py-3">
                        <div class="col-3">
                            Page {{ $lecturers->currentPage() }} of {{ $lecturers->lastPage() }} Pages
                        </div>
                        <div class="col-3">
                            {{-- {{ $lecturers->getOptions() }} --}}
                        </div>
                        <div class="col-6">
                            <div class="float-right">
                                {{ $lecturers->links() }}
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>

    <script>
        function submitFilter(){
            // console.log("triiger");
            document.getElementById("filter").submit();
        }
    </script>
@endsection
