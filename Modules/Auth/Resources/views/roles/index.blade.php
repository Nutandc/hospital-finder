@extends('backend::layouts.master')

@section('header')
    List Roles
@endsection

@section('subHeader')
    Show the list of all roles
@endsection
@section('breadcrumb')
@stop
@section('content')
    @include('backend.partials.error')
    <div class="row">
        <div class="col-xs-12">
            <div class="box-header">
                @can('role-create')
                    <a href="{{ route('roles.create') }}"
                       class="btn btn-primary btn-flat pull-right bootstrap-modal-form-open">
                        Add Role</a>
                @endcan
            </div>
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-condensed dataTable">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th class="no-sort" width="15%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role['name'] }}</td>
                                <td>
                                    @can('role-edit')
                                        <a class="btn btn-primary btn-flat btn-sm" data-container="body"
                                           title="Edit"
                                           href="{{ route('roles.edit', $role['id']) }}"><i
                                                class="fa fa-edit "></i></a>
                                    @endcan
                                    @can('role-delete')
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role['id']],'style'=>'display:inline', 'onsubmit' => "return confirm('Are you sure you want to delete?')"]) !!}
                                        {{ Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger btn-flat btn-sm', "data-container"=>"body",
                                                         "title"=>"Delete" ,'role' => 'button', 'type' => 'submit']) }}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
@endsection
