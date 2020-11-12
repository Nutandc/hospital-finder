@extends('master')
@section('mainContent')
@include('superadmin.sanav')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <h6 class="m-3 font-weight-bold text-primary">Admins</h6>
                <a href="{{ url('/addadminpage') }}" class="m-2 ml-auto btn btn-primary text-white">
                    Add Admin
                </a>
            </div>
        </div>
        @if (session('status'))
        <div class="alert alert-success ml-2 mr-2" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $row)
                        <tr>
                            <td>{{ $row->name}}</td>
                            <td>{{ $row->phone}}</td>
                            <td>{{ $row->email}}</td>
                            <td>
                                <div class="row">
                                    <a href="/adminrole-edit/{{ $row->id }}" class="btn btn-success m-2">Edit</a>
                                    <form action="/adminrole-delete/{{ $row->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" href="" class="btn btn-danger m-2">Delete</button>
                                    </form>
                                    <form action="/adminrole-active/{{ $row->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <button type="submit" href="" class="btn @if($row->active) btn-dark @else btn-light @endif m-2">@if($row->active) Disable @else Enable @endif</button>
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
