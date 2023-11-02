@extends('admin.master')

@section('title')
All-Branch
@endsection



@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                All Branch
            </header>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Branch Name</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        @php
                            $i = 1;
                        @endphp
                        <tbody>
                        @if (count($branches) >0)
                            @foreach ($branches as $branch)
                                <tr>
                                    <th> {{ $i++  }}</th>
                                    <td>{{ $branch->branch_name }}</td>
                                    <td>{{ $branch->branch_address }}</td>
                                    <td>
                                        <a href="{{ url('/edit-branch', $branch->id) }}" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></a>
                                        <a onclick="return confirm('Are you sure?')" href="{{ url('/branch-delete', $branch->id) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                            <tr>
                                <th class="text-center text-danger" colspan="4"> Branch Not Available</th>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
