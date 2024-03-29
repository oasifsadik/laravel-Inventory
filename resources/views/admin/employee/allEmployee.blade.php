@extends('admin.master')

@section('title')
All-Employee
@endsection



@section('content')
<div class="container-fluid">
    <h2><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i></a>|<a href="{{ url('/dashboard/employee') }}">Employees</a></h2>

<div class="row mt-3">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                All Employees
            </header>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Branch Name</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Sallery</th>
                            <th>joining Date</th>
                            <th>NID</th>
                            <th>Phone Number</th>
                            <th>photo</th>
                            <th>Employee Status</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        @php
                            $i = 1;
                        @endphp
                        <tbody>
                        @foreach ($employees as $employee)
                        <tr>
                            <th> {{ $i++  }}</th>
                            <td>{{ $employee->branch->branch_name }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->address }}</td>
                            <td>{{ $employee->sallery }}</td>
                            <td>{{ $employee->joining_date }}</td>
                            <td>{{ $employee->nid }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>
                                <img src="{{ asset('employee/'. $employee->photo) }}" height="80px" width="70px" alt="">
                            </td>
                            <td class="text-center">
                                @if ($employee->is_approved == '1' )
                                    <h1 class="badge badge-pill badge-success font-bold">Active</h1>
                                @else
                                <h1 class="badge badge-pill badge-danger font-bold">Disable</h1>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('dashboard/employees-approved',$employee->id) }}" class="btn btn-outline-primary btn-sm"><i class="fa fa-thumbs-up"></i></a>
                                <a href="{{ url('dashboard/employees-reject', $employee->id) }}" class="btn btn-outline-dark btn-sm"><i class="fa fa-thumbs-down"></i></a>
                            </td>
                            <td>
                                {{-- <a href="{{ url('dashboard/edit', $employee->id) }}" class="btn btn-outline-primary btn-sm"><i class="fa fa-pencil-square-o"></i></a> --}}
                                <a href="{{ url('dashboard/delete', $employee->id) }}" class="btn btn-outline- btn-sm"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
</div>
@endsection
