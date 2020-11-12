@extends('backend::layouts.master')
@section('header')
    Students
@stop
@section('subHeader')
   Show Students
@stop
@section('breadcrumb')

@stop
@section('content')
    @include('backend::partials.errors')
    @include('backend.partials.fieldValidationError')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table id="dataTable" class="table table-bordered table-condensed dataTable">
                        <thead>
                        <tr>
                            <th class="no-sort">Photo</th>
                            <th class="no-sort">Name</th>
                            <th class="no-sort">Guardian Name</th>
                            <th class="no-sort">gender</th>
                            <th class="no-sort">Blood Group</th>
                            <th class="no-sort">phone</th>
                            <th class="no-sort">Email</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $padding = 0;
                        ?>
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
                                    {{$student->name}}
                                </td>
                                <td>
                                    {{$student->gender}}
                                </td> <td>
                                    {{$student->blood_group}}
                                </td> <td>
                                    {{$student->phone}}
                                </td> <td>
                                    {{$student->email}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

@stop

