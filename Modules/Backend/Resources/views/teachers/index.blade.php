@extends('backend::layouts.master')
@section('header')
    Teachers
@stop
@section('subHeader')
    List of  Teacher
@stop
@section('breadcrumb')
@stop
@section('content')
    @include('backend::partials.errors')
    @include('backend.partials.fieldValidationError')

    <div class="row">
        <div class="col-xs-12">
            <div class="box-header">
                @can('teacher-create')
                    <a class="btn btn-primary pull-right btn-flat"
                       href="{{route('teachers.create')}}">Add Teacher</a>
                @endcan
            </div>
            <div class="box">
                <div class="box-body">
                    <table id="dataTable" class="table table-bordered table-condensed dataTable">
                        <thead>
                        <tr>
                            <th class="no-sort">Photo</th>
                            <th class="no-sort">Name</th>
                            <th class="no-sort">Email</th>
                            <th>Status</th>
                            <th class="no-sort action-col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $padding = 0;
                        ?>
                        @foreach($teachers as $key => $teacher)
                            <tr>
                                <td>
                                    <img class="img-responsive"
                                         style="height: 70px !important;"
                                         src="{{$teacher['photos']?
                                        Cloudder::secureShow($student('photo')):URL::asset('images/default_image.jpg')}}"
                                         alt="user image">
                                </td>
                                <td>
                                    {{$teacher->name}}
                                </td>
                                <td>
                                    {{$teacher->email}}
                                </td>
                                <td>

                                <td>
                                    <nobr>
                                        @can('teacher-edit')
                                            <a href="{{route('teachers.edit',$teacher->id)}}"
                                               class="btn btn-primary btn-flat btn-sm">
                                                <i class="fa fa-edit"></i>

                                            </a>
                                        @endcan @can('teacher-show')
                                            <a href="{{route('teachers.show',$teacher->id)}}"
                                               class="btn btn-primary btn-flat btn-sm">
                                                <i class="fa fa-search"></i>

                                            </a>
                                        @endcan
                                        @can('teacher-delete')
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'route' => ['teachers.destroy', $teacher->id],
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
