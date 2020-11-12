@extends('backend::layouts.master')
@section('header')
    Doctors
@stop
@section('subHeader')
    List of Doctors
@stop
@section('breadcrumb')
@stop
@section('content')
    @include('backend.partials.error')
    @can('class-create')
        @include('backend::doctors.create')
    @endcan
    @can('class-edit')
        @include('backend::doctors.edit')
    @endcan
    <div class="row">
        <div class="col-xs-12">
            <div class="box-header">
                @can('class-create')
                    <button class="btn btn-primary pull-right btn-flat bootstrap-modal-form-open"
                            data-toggle="modal" data-target="#modal-create-class">
                        Add Doctor
                    </button>
                @endcan
            </div>
            <div class="box">
                <div class="box-body">
                    <table id="dataTable" class="table table-bordered table-condensed dataTable">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Speciality</th>
                            <th>Designation</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th class="no-sort action-col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($doctors as $doctor)
                            <tr>
                                <td>{{ $doctor->name }}</td>
                                <td>{{ $doctor->speciality }}</td>
                                <td>{{ $doctor->designation }}</td>
                                <td>{{ $doctor->email }}</td>
                                <td>{{ $doctor->phone }}</td>
                                <td>{{ $doctor->address }}</td>
                                <td>
                                    @can('class-edit')
                                        <button class="btn btn-primary btn-flat edit-button btn-sm" data-toggle="modal"
                                                data-target="#modal-edit" value="{{ $doctor['id'] }}"><i
                                                class="fa fa-edit "></i></button>
                                    @endcan
                                    @can('class-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['doctors.destroy', $doctor->id],
                                           'onsubmit' => "return confirm('Are you sure you want to delete?')",'style'=>"display:inline"]) !!}
                                        <button class="btn btn-danger btn-flat  btn-sm"
                                                href="{{ route('doctors.destroy',$doctor->id) }}">
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
                var url = "/doctors/" + id;
                $.ajax({
                    url: url,
                    method: "get"
                }).done(function (response) {
                    $("#modal-edit input[name='name']").val(response.name);
                    $('#modal-edit form').attr('action', '{{ url('/doctors') }}' + '/' + id);
                });
            })
        });
    </script>
@endpush
