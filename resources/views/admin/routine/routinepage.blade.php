@extends('master')
@section('mainContent')
@include('admin.anav')
<ul class="nav nav-tabs m-4">
  @foreach($levels as $level)
  <li class="nav-item">
    <a class="nav-link" href="#">{{ $level->name }}</a>
  </li>
  @endforeach
</ul>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <h6 class="m-3 font-weight-bold text-primary">Subjects</h6>
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
                            <th>Sunday</th>
                            <th>Monday</th>
                            <th>Tuesday</th>
                            <th>Wednesday</th>
                            <th>Thursday</th>
                            <th>Friday</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($routines as $index => $element)
                        <tr>
                            <td>{{ $index + 1 }}</td>
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


<div class="container mb-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Lectures</div>
                <div class="card-body">
                    <form method="POST" action="/addroutine">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                        <div class="form-group row">
                            <label for="link" class="col-md-4 col-form-label text-md-right">Meeting Link</label>
                            <div class="col-md-6">
                                <input id="link" value="{{old('link')}}" type="text" class="form-control @error('link') is-invalid @enderror" name="link" required autocomplete="link" autofocus>
                                @error('link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="day" class="col-md-4 col-form-label text-md-right">{{ __('Day') }}</label>
                            <div class="col-md-6">
                                <select id="day" class="form-control @error('day') is-invalid @enderror" name="day" required autocomplete="day" autofocus>
                                    <option value="">Select</option>
                                    <option value="1">Sunday</option>
                                    <option value="2">Monday</option>
                                    <option value="3">Tuesday</option>
                                    <option value="4">Wednesday</option>
                                    <option value="5">Thursday</option>
                                    <option value="6">Friday</option>
                                </select>
                                @error('day')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="timingid" class="col-md-4 col-form-label text-md-right">{{ __('timingid') }}</label>
                            <div class="col-md-6">
                                <select id="timingid" type="text" class="form-control @error('timingid') is-invalid @enderror" name="timingid" required autocomplete="timingid" autofocus>
                                    <option value="">Select</option>
                                    @foreach ($schedules as $index => $element)
                                    <option value="{{ $element->id}}">{{ $element->starttime}} - {{ $element->endtime}}</option>
                                    @endforeach
                                </select>
                                @error('timingid')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="teacher" class="col-md-4 col-form-label text-md-right">{{ __('Teacher') }}</label>
                            <div class="col-md-6">
                                <select id="teacher" type="text" class="form-control @error('teacher') is-invalid @enderror" name="teacher" required autocomplete="teacher" autofocus>
                                    <option value="">Select</option>
                                    @foreach ($teachers as $index => $element)
                                    <option value="{{ $element->id}}">{{ $element->name}} - {{ $element->phone}}</option>
                                    @endforeach
                                </select>
                                @error('teacher')
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
                                <a href="{{ url('/routine') }}" class="btn btn-danger text-white">
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

@endsection