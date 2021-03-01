@extends('backend::layouts.master')
@section('header')
    Hospital
@stop
@section('subHeader')
    List of Hospital
@stop
@section('breadcrumb')
@stop
@section('content')
    @include('backend.partials.error')
    @can('hospital-create')
        @include('backend::hospitals.create')
    @endcan
    @can('hospital-edit')
        @include('backend::hospitals.edit')
    @endcan
    <div class="row">
        <div class="col-xs-12">
            <div class="box-header">
                @can('hospital-create')
                    <button class="btn btn-primary pull-right btn-flat bootstrap-modal-form-open"
                            data-toggle="modal" data-target="#modal-create-class">
                        Add Hospital
                    </button>
                @endcan
            </div>
            <div class="box">
                <div class="box-body">
                    <table id="dataTable" class="table table-bordered table-condensed dataTable">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th class="no-sort action-col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hospitals as $hospital)
                            <tr>
                                <td>{{ $hospital->name }}</td>
                                <td>
                                    @can('hospital-edit')
                                        <button class="btn btn-primary btn-flat edit-button btn-sm" data-toggle="modal"
                                                data-target="#modal-edit" value="{{ $hospital['id'] }}"><i
                                                class="fa fa-edit "></i></button>
                                    @endcan
                                    @can('hospital-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['hospitals.destroy', $hospital->id],
                                           'onsubmit' => "return confirm('Are you sure you want to delete?')",'style'=>"display:inline"]) !!}
                                        <button class="btn btn-danger btn-flat  btn-sm"
                                                href="{{ route('hospitals.destroy',$hospital->id) }}">
                                            <i
                                                class="fa fa-trash"></i></button>
                                        {!! Form::close() !!}
                                    @endcan
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
        $(document).ready(function () {
            $('#dataTable').on('click', '.edit-button', function () {
                var id = $(this).val();
                var url = "/hospitals/" + id;
                $.ajax({
                    url: url,
                    method: "get"
                }).done(function (response) {
                    $("#modal-edit input[name='name']").val(response.name);
                    $("#modal-edit input[name='special_for']").val(response.special_for);
                    $("#modal-edit input[name='location']").val(response.location);
                    $("#modal-edit input[name='opening_hour']").val(response.opening_hour);
                    $("#modal-edit input[name='country']").val(response.country);
                    $("#modal-edit input[name='email']").val(response.email);
                    $("#modal-edit input[name='phone']").val(response.phone);
                    $("#modal-edit input[name='address']").val(response.address);
                    $("#modal-edit input[name='detail']").val(response.detail);
                    $('#modal-edit form').attr('action', '{{ url('/hospitals') }}' + '/' + id);
                });
            })
        });
    </script>
@endpush
