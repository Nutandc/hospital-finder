@extends('backend::layouts.master')
@section('header')
    List Users
@endsection

@section('subHeader')
    Show the list of all users
@endsection
@section('breadcrumb')
@stop
@section('content')
    @can('user-create')
        @include('auth::users.create')
    @endcan
    @can('user-edit')
        @include('auth::users.edit' )
    @endcan

    @include('backend.partials.error')
    <div class="row">
        <div class="col-xs-12">
            <div class="box-header">
                @can('user-create')
                    <button class="btn btn-primary btn-flat pull-right bootstrap-modal-form-open" data-toggle="modal"
                            data-target="#modal-create"> Add User
                    </button>
                @endcan
            </div>
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-condensed dataTable">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Status</th>
                            <th class="no-sort action-col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user['name'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                <td>
                                    @foreach($user['roles'] as $role)
                                        <span class="label btn btn-flat label-success">{{ $role }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @if ($user['status'] == 1)
                                        <span class="label btn btn-flat label-primary">Active</span>
                                    @else
                                        <span class="label btn btn-flat label-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>

                                    @can('user-edit')
                                        <button class="btn btn-primary btn-flat edit-button btn-sm" data-toggle="modal"
                                                data-target="#modal-edit" value="{{ $user['id'] }}"><i
                                                class="fa fa-edit "></i></button>
                                    @endcan
                                    @if( $user['id'] != \Illuminate\Support\Facades\Auth::id())
                                        {{--                                        @can('user-delete')--}}
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user['id']], 'style'=>'display:inline', 'onsubmit' => "return confirm('Are you sure you want to delete?')"]) !!}
                                        {{ Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger btn-sm btn-flat', 'role' => 'button', 'type' => 'submit',"data-container"=>"body", "data-tooltip"=>"tooltip",
                                                    "title"=>"Delete", "data-placement"=>"bottom"]) }}
                                        {!! Form::close() !!}
                                        {{--                                        @endcan--}}
                                    @endif
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


@push('scripts')

    <script>
        $(document).ready(function () {
            $(document).on('click', '.edit-button', function () {
                var id = $(this).val();
                var url = "/users/" + id;
                $.ajax({
                    url: url,
                    method: "get"
                }).done(function (response) {
                    $("#modal-edit input[name='name']").val(response.name);
                    $("#modal-edit input[name='email']").val(response.email);
                    if (response.status == 1)
                        $("#modal-edit input[name='status']").prop('checked', true).change();
                    else
                        $("#modal-edit input[name='status']").prop('checked', false).change();
                    if (response.super == 1)
                        $("#modal-edit input[name='super']").prop('checked', true).iCheck('update');
                    else
                        $("#modal-edit input[name='super']").prop('checked', false).iCheck('update');

                    //get the role selected
                    $("#modal-edit select[name='roles'] option").filter(function () {
                        return $(this).text().trim() == response.roles;
                    }).prop('selected', true).trigger('change.select2');
                    //change the URL of the action of edit form
                    $("#modal-edit form").attr('action', '{{ url('/users') }}' + '/' + id);
                });
            });


            @if (Auth::user()->isSuper())
            $("input[name='super']").on('ifChecked', function (event) {
                $("select[name='roles']").val('1');
            });
            $("input[name='super']").on('ifUnchecked', function (event) {
                $("select[name='roles']").val('');
            });
            @endif
        });
    </script>

@endpush
