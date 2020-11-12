@extends('master')
@section('mainContent')
@include('admin.anav')
<div class="container mb-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Timing</div>
                <div class="card-body">
                    <form method="POST" action="/addschedule">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                        <div class="form-group row">
                            <label for="starttime" class="col-md-4 col-form-label text-md-right">Start Time</label>
                            <div class="col-md-6">
                                <input id="starttime" type="time" class="form-control @error('starttime') is-invalid @enderror" name="starttime" required autocomplete="starttime" autofocus>
                                @error('starttime')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="endtime" class="col-md-4 col-form-label text-md-right">End Time</label>
                            <div class="col-md-6">
                                <input id="endtime" type="time" class="form-control @error('endtime') is-invalid @enderror" name="endtime" required autocomplete="endtime" autofocus>
                                @error('endtime')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                                <a href="{{ url('/schedule-page') }}" class="btn btn-danger text-white">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <h6 class="m-3 font-weight-bold text-primary">Timings</h6>
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
                            <th>S. No.</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schedules as $index => $element)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $element->starttime}}</td>
                            <td>{{ $element->endtime}}</td>
                            <td>
                                <div class="row">
                                    <form action="/schedule-delete/{{ $element->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" href="" class="btn btn-danger ml-2">Delete</button>
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