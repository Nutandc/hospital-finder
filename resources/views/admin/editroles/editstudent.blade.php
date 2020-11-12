@extends('master')
@section('mainContent')
@include('admin.anav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Student</div>
                <div class="card-body">
                    <form method="POST" action="/studentrole-update/{{ $users->id }}">
                        <!-- @csrf -->
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" value="{{ $users->name }}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="class" class="col-md-4 col-form-label text-md-right">{{ __('Class') }}</label>
                            <div class="col-md-6">
                                <select id="class" type="text" class="form-control @error('class') is-invalid @enderror" name="class" required autocomplete="class" autofocus>
                                    <option value="">Select</option>
                                    @foreach ($levels as $index => $element)
                                    <option value="{{ $element->name}}">{{ $element->name}}</option>
                                    @endforeach
                                </select>
                                @error('class')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="roll" class="col-md-4 col-form-label text-md-right">{{ __('Roll') }}</label>
                            <div class="col-md-6">
                                <input id="roll" value="{{ $students->roll }}" type="text" class="form-control @error('roll') is-invalid @enderror" name="roll" value="{{ old('roll') }}" required autocomplete="roll" autofocus>
                                @error('roll')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fathername" class="col-md-4 col-form-label text-md-right">Father Name:</label>

                            <div class="col-md-6">
                                <input id="fathername" value="{{ $students->fathername }}" type="text" class="form-control @error('fathername') is-invalid @enderror" name="fathername" required autocomplete="fathername">

                                @error('fathername')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mothername" class="col-md-4 col-form-label text-md-right">Mother Name:</label>

                            <div class="col-md-6">
                                <input id="mothername" type="text" value="{{ $students->mothername }}" class="form-control @error('mothername') is-invalid @enderror" name="mothername" required autocomplete="mothername">

                                @error('mothername')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" value="{{ $users->email }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" value="{{ $users->phone }}" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="duefee" class="col-md-4 col-form-label text-md-right">Due Fee</label>

                            <div class="col-md-6">
                                <input id="duefee" value="{{ $students->duefee }}" type="tel" class="form-control @error('duefee') is-invalid @enderror" name="duefee" value="{{ old('duefee') }}" required autocomplete="duefee">

                                @error('duefee')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                            <div class="col-md-6">
                                <input id="address" value="{{ $students->address }}" type="tel" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                                <a href="{{ url('/student-page') }}" class="btn btn-danger text-white">
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