@extends('master')
@section('mainContent')
@include('admin.anav')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <div class="row">
                <h6 class="m-3 font-weight-bold text-primary">Students</h6>
                <a href="{{ url('/addstudentpage') }}" class="m-2 ml-auto btn btn-primary text-white">
                    Add Student
                </a>
            </div>
        </div>
        @if (session('status'))
        <div class="alert alert-success mt-2 ml-2 m-2" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Roll</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $row)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $row['name']}}</td>
                            <td>{{$students[$key]->class}}</td>
                            <td>{{$students[$key]->roll}}</td>
                            <td>{{ $row['email']}}</td>
                            <td>{{ $row['phone']}}</td>
                            <td>{{$students[$key]->address}}</td>
                            <td>
                                <div class="row">
                                    <a href="/studentrole-edit/{{ $row->id }}" class="btn btn-success m-2">Edit</a>
                                    <form action="/studentrole-delete/{{ $row->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" href="" class="btn btn-danger m-2">Delete</button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection