@extends('master')
@section('mainContent')
@include('admin.anav')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <h6 class="m-3 font-weight-bold text-primary">Teachers</h6>
                <a href="{{ url('/addteacherpage') }}" class="m-2 ml-auto btn btn-primary text-white">
                    Add Teacher
                </a>
            </div>
        </div>
        @if (session('status'))
        <div class="alert alert-success mt-2 ml-2 mr-2" role="alert">
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
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Salary</th>
                            <th>Due</th>
                            <th>Join Date</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $row)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $row['name']}}</td>
                            <td>{{ $row['phone']}}</td>
                            <td>{{ $row['email']}}</td>
                            <td>Rs. {{$teachers[$key]->salary}}</td>
                            <td>Rs. {{$teachers[$key]->duesalary}}</td>
                            <td>{{$teachers[$key]->joindate}}</td>
                            <td>{{$teachers[$key]->address}}</td>
                            <td>
                                <div class="row">
                                    <a href="/teacherrole-edit/{{ $row->id }}" class="btn btn-success m-2">Edit</a>
                                    <form action="/teacherrole-delete/{{ $row->id }}" method="POST">
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