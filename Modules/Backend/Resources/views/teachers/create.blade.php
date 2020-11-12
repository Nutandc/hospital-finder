@extends('backend::layouts.master')
@section('header')
    Create Teachers
@stop
@section('subHeader')
    Create Teachers

@stop
@section('breadcrumb')
@stop

@section('content')
    @include('backend.partials.error')
    @include('backend.partials.fieldValidationError')
    <div class="row">
        <div class="col-md-12">
            {!! Form::model($teacher, array('url'=>route('teachers.store'), 'method'=>'POST',
                'class'=>'form-horizontal',
               'enctype'=>'multipart/form-data')) !!}
            <div class="box box-default">
                <div class="box-body">
                    @include('backend::teachers.form')
                </div>
                <div class="box-footer">
                    <div class="col-md-12">
                        <a href="{{route('teachers.index')}}" class="btn btn-default btn-flat pull-left">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary btn-flat pull-right">Submit</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

