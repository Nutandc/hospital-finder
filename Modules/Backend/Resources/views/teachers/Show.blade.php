@extends('backend::layouts.master')
@section('header')
    Teachers
@stop
@section('subHeader')
   Show Teachers
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
                            <th class="no-sort">User Name</th>

                            <th class="no-sort">Designation</th>
                            <th class="no-sort">Religion</th>
                            <th class="no-sort">gender</th>
                            <th class="no-sort">Address</th>
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
                                         src="{{$teacher['photos']?
                                        Cloudder::secureShow($teacher['photo']):URL::asset('images/default_image.jpg')}}"
                                         alt="user image">
                                </td>
                                <td>
                                    {{$teacher->username}}
                                </td>
                                <td>
                                    {{$teacher->designation}}
                                </td>
                                <td>
                                    {{$teacher->eligion}}
                                </td>
                                <td>
                                    {{$teacher->gender}}
                                </td> <td>
                                    {{$teacher->address}}
                                </td>

                                <td>
                                    {{$teacher->email}}
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
