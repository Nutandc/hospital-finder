<div class="modal-body">
    <div class="form-group {{ $errors->has('name') ? 'has-error':'' }}">
        {{ Form::label('name', 'Name:', ['class'=>'col-sm-2 control-label'])}}
        <div class="col-sm-10">
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control', 'autofocus')) !!}
        </div>
        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-flat  btn-primary">Submit</button>
</div>
