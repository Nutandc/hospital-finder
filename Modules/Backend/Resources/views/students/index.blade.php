@extends('backend::layouts.master')
@section('header')
    Students
@stop
@section('subHeader')
    List of  Students
@stop
@section('breadcrumb')

@stop
@section('content')
    @include('backend::partials.errors')
    @include('backend.partials.fieldValidationError')
    <div class="row">
        <div class="col-xs-12">
            <div class="box-header">
                @can('student-create')
                    <a class="btn btn-primary pull-right btn-flat"
                       href="{{route('students.create')}}">Add Student</a>
                @endcan
            </div>
            <div class="box">
                <div class="box-body">
                    <table id="dataTable" class="table table-bordered table-condensed dataTable">
                        <thead>
                        <tr>
                            <th class="no-sort">Photo</th>
                            <th class="no-sort">Name</th>
                            <th class="no-sort">Roll</th>
                            <th class="no-sort">Email</th>
                            <th>Status</th>
                            <th class="no-sort action-col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $padding = 0;
                        ?>
                        @foreach($students as $key => $student)
                            <tr>
                                <td>

                                    <img class="img-responsive"
                                         style="height: 70px !important;"
                                         src="{{$student['photo']?
                                        Cloudder::secureShow($student['photo']):URL::asset('images/default_image.jpg')}}"
                                         alt="user image">
                                </td>
                                <td>
                                    {{$student->name}}
                                </td>
                                <td>
                                    {{$student->roll_no}}
                                </td>
                                <td>
                                    {{$student->email}}
                                </td>
                                <td>

                                <td>
                                    <nobr>
                                        @can('student-edit')
                                            <a href="{{route('students.edit',$student->id)}}"
                                               class="btn btn-primary btn-flat btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan @can('student-show')
                                            <a href="{{route('students.show',$student->id)}}"
                                               class="btn btn-primary btn-flat btn-sm">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        @endcan
                                        @can('student-delete')
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'route' => ['students.destroy', $student->id],
                                                'onsubmit' => "return confirm('Are you sure you want to delete?')",
                                                'style'=>"display:inline"
                                                ]) !!}
                                            <button class="btn btn-danger btn-flat btn-sm" role="button" type="submit">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        @endcan
                                    </nobr>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

@stop
@push('scripts')

    <script>
    </script>
@endpush
