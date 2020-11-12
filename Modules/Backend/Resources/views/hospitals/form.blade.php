<div class="modal-body">
    <div class="form-group {{ $errors->has('name') ? 'has-error':'' }}">
        {{ Form::label('name', 'Name:', ['class'=>'col-sm-2 control-label required'])}}
        <div class="col-sm-10">
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control', 'autofocus')) !!}
        </div>
        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
    </div>
    <div class="form-group {{ $errors->has('location') ? 'has-error':'' }}">
        {{ Form::label('location', 'Location:', ['class'=>'col-sm-2 control-label required'])}}
        <div class="col-sm-10">
            {!! Form::text('location', null, array('placeholder' => 'Location','class' => 'form-control', 'autofocus')) !!}
        </div>
        {!! $errors->first('location', '<span class="help-block">:message</span>') !!}
    </div>
    <div class="form-group {{ $errors->has('opening_hour') ? 'has-error':'' }}">
        {{ Form::label('opening_hour', 'Opening Hour:', ['class'=>'col-sm-2 control-label required'])}}
        <div class="col-sm-10">
            {!! Form::text('opening_hour', null, array('placeholder' => 'Opening Hour','class' => 'form-control', 'autofocus')) !!}
        </div>
        {!! $errors->first('opening_hour', '<span class="help-block">:message</span>') !!}
    </div>
    <div class="form-group {{ $errors->has('special_for') ? 'has-error':'' }}">
        {{ Form::label('special_for', 'Speciality:', ['class'=>'col-sm-2 control-label required'])}}
        <div class="col-sm-10">
            {!! Form::text('special_for', null, array('placeholder' => 'Speciality','class' => 'form-control', 'autofocus')) !!}
        </div>
        {!! $errors->first('special_for', '<span class="help-block">:message</span>') !!}
    </div>


    <div class="form-group  {{ $errors->has('address') ? 'has-error':'' }}">
        {{ Form::label('address', 'Address:', ['class'=>'col-sm-2 control-label required'])}}
        <div class="col-sm-10">
            {!! Form::text('address', null, array('placeholder' => 'Address','class' => 'form-control', 'autofocus')) !!}
        </div>
    </div>
    <div class="form-group  {{ $errors->has('phone') ? 'has-error':'' }}">
        {{ Form::label('phone', 'Phone :', ['class'=>'col-sm-2 control-label'])}}
        <div class="col-sm-10">
            {!! Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control', 'autofocus')) !!}
        </div>
    </div>

    <div class="form-group  {{ $errors->has('detail') ? 'has-error':'' }}">
        {{ Form::label('detail', 'Detail:', ['class'=>'col-sm-2 control-label'])}}
        <div class="col-sm-10">
            {!! Form::text('detail', null, array('placeholder' => 'Detail','class' => 'form-control', 'autofocus')) !!}
        </div>
    </div>
    <div class="form-group  {{ $errors->has('image') ? 'has-error':'' }}">
        {{ Form::label('image', 'Image:', ['class'=>'col-sm-2 control-label'])}}
        <div class="col-sm-10">
            {!! Form::file('image',  array('class' => 'form-control','multiple'=>true, 'id'=>'images')) !!}
        </div>
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-flat  btn-primary">Submit</button>
</div>
