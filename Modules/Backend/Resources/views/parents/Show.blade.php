@extends('backend::layouts.master')
@section('header')
    Parents
@stop
@section('subHeader')
    Show Parents
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
                                     src="{{$parent['photo']?
                                        Cloudder::secureShow($parent['photo']):URL::asset('images/default_image.jpg')}}"
                                     alt="user image">
                            </td>
                            <td>
                                {{$parent->guardian_name}}
                            </td>
                            <td>
                                {{$parent->address}}
                            </td>

                            <td>
                                {{$parent->email}}
                            </td>
                            <td></td>
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
