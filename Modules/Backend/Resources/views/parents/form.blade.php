<div class="modal-body">
    <div class="form-group  {{ $errors->has('guardian_name') ? 'has-error':'' }}">
        {{ Form::label('guardian_name', 'Guardian Name:', ['class'=>'col-sm-2 control-label required'])}}
        <div class="col-sm-10">
            {!! Form::text('guardian_name', null, array('placeholder' => 'Name','class' => 'form-control', 'autofocus','required')) !!}
        </div>
    </div>
    <div class="form-group  {{ $errors->has('email') ? 'has-error':'' }}">
        {{ Form::label('email ', 'Email :', ['class'=>'col-sm-2 control-label required'])}}
        <div class="col-sm-10">
            {!! Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control', 'autofocus')) !!}
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
    <div class="form-group  {{ $errors->has('photo') ? 'has-error':'' }}">
        {{ Form::label('photo', 'Images:', ['class'=>'col-sm-2 control-label'])}}
        <div class="col-sm-10">
            {!! Form::file('photo',  array('class' => 'form-control','multiple'=>true, 'id'=>'images')) !!}
        </div>
    </div>
    <div class="form-group  {{ $errors->has('user_name') ? 'has-error':'' }}">
        {{ Form::label('user_name ', 'User Name :', ['class'=>'col-sm-2 control-label required'])}}
        <div class="col-sm-10">
            {!! Form::text('user_name', null, array('placeholder' => 'User Name','class' => 'form-control', 'autofocus')) !!}
        </div>
    </div>




</div>
{{--<div class="modal-footer">--}}
{{--    <button type="button" class="btn btn-flat btn-default pull-left" data-dismiss="modal">Close</button>--}}
{{--    <button type="submit" class="btn btn-flat btn-primary">Submit</button>--}}
{{--</div>--}}
