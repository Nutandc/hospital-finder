<div class="modal-body">
    <div class="form-group  {{ $errors->has('name') ? 'has-error':'' }}">
        {{ Form::label('name', 'Name:', ['class'=>'col-sm-2 control-label required'])}}
        <div class="col-sm-10">
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control', 'autofocus','required')) !!}
        </div>
    </div>
    <div class="form-group  {{ $errors->has('designation') ? 'has-error':'' }}">
        {{ Form::label('designation', 'Designation :', ['class'=>'col-sm-2 control-label required'])}}
        <div class="col-sm-10">
            {!! Form::text('designation', null, array('placeholder' => 'Designation','class' => 'form-control', 'autofocus')) !!}
        </div>
    </div>
    <div class="form-group  {{ $errors->has('religion') ? 'has-error':'' }}">
        {{ Form::label('religion', 'Religion:', ['class'=>'col-sm-2 control-label'])}}
        <div class="col-sm-10">
            {!! Form::text('religion', null, array('placeholder' => 'Name','class' => 'form-control', 'autofocus')) !!}
        </div>
    </div>
    <div class="form-group  {{ $errors->has('email') ? 'has-error':'' }}">
        {{ Form::label('email ', 'Email :', ['class'=>'col-sm-2 control-label required'])}}
        <div class="col-sm-10">
            {!! Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control', 'autofocus')) !!}
        </div>
    </div>
    <div class="form-group  {{ $errors->has('date_of_birth') ? 'has-error':'' }}">
        {{ Form::label('date_of_birth', 'Date of birth:', ['class'=>'col-sm-2 control-label required'])}}
        <div class="col-sm-10">
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                {!! Form::text('date_of_birth', null, array('class' => 'form-control pull-right datepicker', 'autocomplete'=>'off')) !!}
            </div>
        </div>
    </div>
    <div class="form-group  {{ $errors->has('phone') ? 'has-error':'' }}">
        {{ Form::label('phone', 'Phone:', ['class'=>'col-sm-2 control-label'])}}
        <div class="col-sm-10">
            {!! Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control', 'autofocus')) !!}
        </div>
    </div>
    <div class="form-group  {{ $errors->has('address') ? 'has-error':'' }}">
        {{ Form::label('address', 'Address:', ['class'=>'col-sm-2 control-label'])}}
        <div class="col-sm-10">
            {!! Form::text('address', null, array('placeholder' => 'Address','class' => 'form-control', 'autofocus')) !!}
        </div>
    </div>
    <div class="form-group  {{ $errors->has('joining_date') ? 'has-error':'' }}">
        {{ Form::label('joining_date', 'Joining Date:', ['class'=>'col-sm-2 control-label required'])}}
        <div class="col-sm-10">
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                {!! Form::text('joining_date', null, array('class' => 'form-control pull-right datepicker', 'autocomplete'=>'off')) !!}
            </div>
        </div>
    </div>
    <div class="form-group  {{ $errors->has('username') ? 'has-error':'' }}">
        {{ Form::label('username ', 'Username :', ['class'=>'col-sm-2 control-label required'])}}
        <div class="col-sm-10">
            {!! Form::text('username', null, array('placeholder' => 'Username','class' => 'form-control', 'autofocus')) !!}
        </div>
    </div>
    <div class="form-group  {{ $errors->has('password') ? 'has-error':'' }}">
        {{ Form::label('password ', 'Password :', ['class'=>'col-sm-2 control-label required'])}}
        <div class="col-sm-10">
            {!! Form::password('password', ['class' => 'form-control', 'autofocus']) !!}
        </div>
    </div>



</div>
{{--<div class="modal-footer">--}}
{{--    <button type="button" class="btn btn-flat btn-default pull-left" data-dismiss="modal">Close</button>--}}
{{--    <button type="submit" class="btn btn-flat btn-primary">Submit</button>--}}
{{--</div>--}}
