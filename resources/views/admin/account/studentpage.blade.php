@extends('master')
@section('mainContent')
@include('admin.anav')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <div class="row">
                <h6 class="m-3 font-weight-bold text-primary">Students</h6>
                <div class="row ml-auto mr-4">
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="/class-account" method="get">
                        <div class="input-group">
                            <select id="class" type="text" class="form-control bg-white border-0 small" name="class">
                                @foreach ($levels as $index => $element)
                                <option value="{{ $select = $element->name }}">{{ $element->name}}</option>
                                @endforeach
                            </select> 
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
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
                            <th>Phone</th>
                            <th>Due</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $row)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $row['name']}}</td>
                            <td>{{ $row['phone']}}</td>
                            <td>
                                <div class="row">
                                    <a href="/studentrole-edit/{{ $row->id }}" class="btn btn-success m-2">Pay Now</a>
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