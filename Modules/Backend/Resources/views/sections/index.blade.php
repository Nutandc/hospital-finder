@extends('backend::layouts.master')
@section('header')
    Section
@stop
@section('subHeader')
    List of Section
@stop
@section('breadcrumb')
@stop
@section('content')
    @include('backend.partials.error')
    @include('backend.partials.fieldValidationError')
    @can('class-create')
        @include('backend::sections.create')
    @endcan
    @can('section-edit')
        @include('backend::sections.edit')
    @endcan
    <div class="row">

        <div class="col-xs-12">
            <div class="box-header">
                @can('section-create')
                    <button class="btn btn-primary pull-right btn-flat bootstrap-modal-form-open"
                            data-toggle="modal" data-target="#modal-create-section">
                        Add Section
                    </button>
                @endcan
            </div>
            <div class="box">
                <div class="box-body">
                    <table id="dataTable" class="table table-bordered table-condensed dataTable">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Capacity</th>
                            <th>Class</th>
                            <th>Teacher Name</th>
                            <th>Note</th>
                            <th class="no-sort action-col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sections as $section)
                            <tr>
                                <td>{{ $section->name }}</td>
                                <td>{{ $section->name }}</td>
                                <td>{{ $section->name }}</td>
                                <td>{{ $section->name }}</td>
                                <td>{{ $section->name }}</td>
                                <td>


                                        @can('section-edit')
                                            <button class="btn btn-primary btn-flat edit-button btn-sm" data-toggle="modal"
                                                    data-target="#modal-edit" value="{{ $section['id'] }}"><i
                                                    class="fa fa-edit "></i></button>
                                        @endcan

                                    @can('section-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['sections.destroy', $section->id],
                                           'onsubmit' => "return confirm('Are you sure you want to delete?')",'style'=>"display:inline"]) !!}
                                        <button class="btn btn-danger btn-flat  btn-sm"
                                                href="{{ route('sections.destroy',$section->id) }}">
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
                var url = "/sections/" + id;
                $.ajax({
                    url: url,
                    method: "get"
                }).done(function (response) {
                    $("#modal-edit input[name='name']").val(response.name);
                    $("#modal-edit input[name='capacity']").val(response.capacity);
                    $("#modal-edit select[name='class']").val(response.class).trigger('change');
                    $("#modal-edit input[name='teacher']").val(response.teacher).trigger('change');
                    $("#modal-edit input[name='note']").val(response.note);
                    $('#modal-edit form').attr('action', '{{ url('/sections') }}' + '/' + id);
                });
            })
        });
    </script>
@endpush
