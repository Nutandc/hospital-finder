<div class="modal-body">
    <div class="form-group">
        {{ Form::label('name', 'Name:', ['class'=>'col-sm-2 control-label required'])}}
        <div class="col-sm-10">
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control', 'autofocus')) !!}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('email', 'Email:', ['class'=>'col-sm-2 control-label required'])}}
        <div class="col-sm-10">
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('status', 'Status:', ['class'=>'col-sm-2 control-label'])}}
        <div class="col-sm-10">
            {!! Form::hidden('status', 0) !!}
            <input name="status" value="1" type="checkbox" data-toggle="toggle" data-on="Active" data-off="Inactive">
        </div>
    </div>
    @if (Auth::user()->isSuper())
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox icheck">
                    <label>
                        {{ Form::checkbox('super', '1') }} Is Super Admin
                    </label>
                </div>
            </div>
        </div>
    @endif
    <div class="form-group">
        {{ Form::label('role', 'Role:', ['class'=>'col-sm-2 control-label required'])}}
        <div class="col-sm-10">
            {!! Form::select('roles', $roles, null ,array('placeholder' => 'Select Role','class' => 'form-control select2','style'=>'width:100%;')) !!}
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary btn-flat">Submit</button>
</div>