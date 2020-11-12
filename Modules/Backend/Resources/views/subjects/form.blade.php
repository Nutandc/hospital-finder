<div class="modal-body">
    <div class="form-group  {{ $errors->has('class_name') ? 'has-error':'' }}">
        {{ Form::label('class_name', 'Class Name:', ['class'=>'col-sm-2 control-label required'])}}
        <div class="col-sm-10">
            {!! Form::select('class_name', $selectClass, null,array('placeholder' => 'Class Name','class' => 'form-control', 'autofocus','required')) !!}
        </div>
    </div>

    <div class="form-group {{$errors->has('teacher_name')?'has-error':''}}">
        {{ Form::label('teacher_name', 'Teacher Name:', ['class'=>'col-sm-2  control-label required'])}}
        <div class="col-sm-10">
            {!! Form::select('teacher_name',$selectTeacher, null, array('placeholder' => 'Select Teacher','class' => 'form-control'  ,'autofocus')) !!}
        </div>
        {!! $errors->first('teacher_name', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{$errors->has('tyoe')?'has-error':''}}">
        {{ Form::label('type', 'Type:', ['class'=>'col-sm-2  control-label required'])}}
        <div class="col-sm-10">
            {!! Form::select('type',$selectType, null, array('placeholder' => 'Select Type','class' => 'form-control'  ,'autofocus')) !!}
        </div>
        {!! $errors->first('type', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group  {{ $errors->has('pass_mark') ? 'has-error':'' }}">
        {{ Form::label('pass_mark', 'Pass Mark :', ['class'=>'col-sm-2 control-label required'])}}
        <div class="col-sm-10">
            {!! Form::number('pass_mark', null, array('placeholder' => 'Pass Mark','class' => 'form-control', 'autofocus')) !!}
        </div>
    </div>
    <div class="form-group  {{ $errors->has('final_mark') ? 'has-error':'' }}">
        {{ Form::label('final_mark', 'Final Mark:', ['class'=>'col-sm-2 control-label required'])}}
        <div class="col-sm-10">
            {!! Form::text('final_mark', null, array('placeholder' => 'Final Mark','class' => 'form-control', 'autofocus')) !!}
        </div>
    </div>

    <div class="form-group  {{ $errors->has('subject_name') ? 'has-error':'' }}">
        {{ Form::label('subject_name', 'Subject Name:', ['class'=>'col-sm-2 control-label required'])}}
        <div class="col-sm-10">
            {!! Form::text('subject_name', null, array('placeholder' => 'Subject Name','class' => 'form-control', 'autofocus')) !!}
        </div>
    </div>

    <div class="form-group  {{ $errors->has('subject_author') ? 'has-error':'' }}">
        {{ Form::label('subject_author', 'Subject Author:', ['class'=>'col-sm-2 control-label'])}}
        <div class="col-sm-10">
            {!! Form::text('subject_author', null, array('placeholder' => 'Subject Author','class' => 'form-control', 'autofocus')) !!}
        </div>
    </div>
    <div class="form-group  {{ $errors->has('subject_code') ? 'has-error':'' }}">
        {{ Form::label('subject_code', 'Subject Code:', ['class'=>'col-sm-2 control-label required'])}}
        <div class="col-sm-10">
            {!! Form::text('subject_code', null, array('placeholder' => 'Subject Code','class' => 'form-control', 'autofocus')) !!}
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-flat  btn-primary">Submit</button>
    </div>
</div>
