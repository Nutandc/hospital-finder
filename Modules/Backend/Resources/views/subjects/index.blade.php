@extends('backend::layouts.master')
@section('header')
    Subjects
@stop
@section('subHeader')
    List of Subjects
@stop
@section('breadcrumb')
@stop
@section('content')
    @include('backend.partials.error')
    @can('subject-create')
        @include('backend::subjects.create')
    @endcan
    @can('subject-edit')
        @include('backend::subjects.edit')
    @endcan
    <div class="row">
        <div class="col-xs-12">
            <div class="box-header">
                @can('subject-create')
                    <button class="btn btn-primary pull-right btn-flat bootstrap-modal-form-open"
                            data-toggle="modal" data-target="#modal-create-subject">
                        Add Subject
                    </button>
                @endcan
            </div>
            <div class="box">
                <div class="box-body">
                    <table id="dataTable" class="table table-bordered table-condensed dataTable">
                        <thead>
                        <tr>
                            <th>Subject Name</th>
                            <th>Subject Author</th>
                            <th>Subject Code</th>
                            <th>Teacher</th>
                            <th>Pass Mark</th>
                            <th>Final Mark</th>
                            <th>Types</th>
                            <th class="no-sort action-col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subjects as $subject)
                            <tr>
                                <td>{{ $subject->subject_name }}</td>
                                <td>{{ $subject->subject_author }}</td>
                                <td>{{ $subject->subject_code }}</td>
                                <td>{{ $subject->teacher }}</td>
                                <td>{{ $subject->pass_mark }}</td>
                                <td>{{ $subject->final_mark }}</td>
                                <td>{{ $subject->types }}</td>
                                <td>
                                    @can('subject-edit')
                                        <button class="btn btn-primary btn-flat edit-button btn-sm" data-toggle="modal"
                                                data-target="#modal-edit" value="{{ $subject['id'] }}"><i
                                                class="fa fa-edit "></i></button>
                                    @endcan
                                    @can('subject-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['subects.destroy', $subject->id],
                                           'onsubmit' => "return confirm('Are you sure you want to delete?')",'style'=>"display:inline"]) !!}
                                        <button class="btn btn-danger btn-flat  btn-sm"
                                                href="{{ route('subects.destroy',$subject->id) }}">
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
                var url = "/subjects/" + id;
                $.ajax({
                    url: url,
                    method: "get"
                }).done(function (response) {
                    $("#modal-edit input[name='name']").val(response.name);
                    $('#modal-edit form').attr('action', '{{ url('/subjects') }}' + '/' + id);
                });
            })


        });
    </script>
@endpush
