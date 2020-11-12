<div class="modal-body">
    <div class="form-group {{ $errors->has('name') ? 'has-error':'' }}">
        {{ Form::label('name', 'Name:', ['class'=>'col-sm-2 control-label required'])}}
        <div class="col-sm-10">
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control', 'autofocus')) !!}
        </div>
        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
    </div>
    <div class="form-group {{ $errors->has('capacity') ? 'has-error':'' }}">
        {{ Form::label('capacity', 'Capacity:', ['class'=>'col-sm-2 control-label required'])}}
        <div class="col-sm-10">
            {!! Form::text('capacity', null, array('placeholder' => 'Capacity','class' => 'form-control', 'autofocus')) !!}
        </div>
        {!! $errors->first('capacity', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{$errors->has('class')?'has-error':''}}">
        {{ Form::label('class', 'Class:', ['class'=>'col-sm-2  control-label required'])}}
        <div class="col-sm-10">
            {!! Form::select('class',$selectClass, null, array('placeholder' => 'Select Class','class' => 'form-control'  ,'autofocus')) !!}
        </div>
        {!! $errors->first('class', '<span class="help-block">:message</span>') !!}
    </div>
    <div class="form-group {{ $errors->has('teacher') ? 'has-error':'' }}">
        {{ Form::label('teacher', 'Teacher Name:', ['class'=>'col-sm-2 control-label required'])}}
        <div class="col-sm-10">
            {!! Form::select('teacher',$selectTeacher, null, array('placeholder' => 'Teacher Name','class' => 'form-control', 'autofocus')) !!}
        </div>
        {!! $errors->first('teacher', '<span class="help-block">:message</span>') !!}
    </div>
    <div class="form-group {{ $errors->has('note') ? 'has-error':'' }}">
        {{ Form::label('note', 'Note:', ['class'=>'col-sm-2 control-label'])}}
        <div class="col-sm-10">
            {!! Form::text('note', null, array('placeholder' => 'Note','class' => 'form-control', 'autofocus')) !!}
        </div>
        {!! $errors->first('note', '<span class="help-block">:message</span>') !!}
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-flat  btn-primary">Submit</button>
</div>
