<div class="modal-body">
    <div class="form-group  {{ $errors->has('name') ? 'has-error':'' }}">
        {{ Form::label('name', 'Name:', ['class'=>'col-sm-2 control-label required'])}}
        <div class="col-sm-10">
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control', 'autofocus','required')) !!}
        </div>
    </div>

    <div class="form-group {{$errors->has('guardian')?'has-error':''}}">
        {{ Form::label('guardian', 'Guardian:', ['class'=>'col-sm-2  control-label'])}}
        <div class="col-sm-10">
            {!! Form::select('guardian',$selectGuardian, null, array('placeholder' => 'Select Guardian','class' => 'form-control'  ,'autofocus')) !!}
        </div>
        {!! $errors->first('guardian', '<span class="help-block">:message</span>') !!}
    </div>
    <div class="form-group  {{ $errors->has('date_of_birth') ? 'has-error':'' }}">
        {{ Form::label('date_of_birth', 'Date of birth:', ['class'=>'col-sm-2 control-label'])}}
        <div class="col-sm-10">
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                {!! Form::text('date_of_birth', null, array('class' => 'form-control pull-right datepicker', 'autocomplete'=>'off')) !!}
            </div>
        </div>
    </div>

    <div class="form-group {{$errors->has('gender')?'has-error':''}}">
        {{ Form::label('gender', 'Gender:', ['class'=>'col-sm-2  control-label'])}}
        <div class="col-sm-10">
            {!! Form::select('gender',$selectGender, null, array('placeholder' => 'Select Gender','class' => 'form-control'  ,'autofocus')) !!}
        </div>
        {!! $errors->first('gender', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group {{$errors->has('blood_group')?'has-error':''}}">
        {{ Form::label('blood_group', 'Blood Group:', ['class'=>'col-sm-2  control-label'])}}
        <div class="col-sm-10">
            {!! Form::select('blood_group',$selectBloodGroup, null, array('placeholder' => 'Select Blood Group','class' => 'form-control'  ,'autofocus')) !!}
        </div>
        {!! $errors->first('blood_group', '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group  {{ $errors->has('email') ? 'has-error':'' }}">
        {{ Form::label('email', 'Email :', ['class'=>'col-sm-2 control-label'])}}
        <div class="col-sm-10">
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control', 'autofocus')) !!}
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

    <div class="form-group">
        {{ Form::label('country', 'Country:', ['class'=>'col-sm-2 control-label'])}}
        <div class="col-sm-10">
            {{ Form::select('country',$selectCountries, env('default_country'),
            ['class'=>'form-control select2', 'placeholder'=>'Select Country','style'=>'width:100%;']) }}
        </div>
    </div>


    <div class="form-group {{$errors->has('class')?'has-error':''}}">
        {{ Form::label('class', 'Class:', ['class'=>'col-sm-2 control-label required'])}}
        <div class="col-sm-10">
            {{ Form::select('class',$selectClass, null,
            ['class'=>'form-control select2', 'placeholder'=>'Select Class','style'=>'width:100%;']) }}
        </div>
    </div>


    <div class="form-group {{$errors->has('section')?'has-error':''}}">
        {{ Form::label('section', 'Section:', ['class'=>'col-sm-2 control-label required'])}}
        <div class="col-sm-10">
            {{ Form::select('section',$selectSection, null,
            ['class'=>'form-control select2', 'placeholder'=>'Select Section','style'=>'width:100%;']) }}
        </div>
    </div>


    <div class="form-group  {{ $errors->has('register_no') ? 'has-error':'' }}">
        {{ Form::label('register_no ', 'Register No :', ['class'=>'col-sm-2 control-label required'])}}
        <div class="col-sm-10">
            {!! Form::text('register_no', null, array('placeholder' => 'Register No','class' => 'form-control', 'autofocus')) !!}
        </div>
    </div>
    <div class="form-group  {{ $errors->has('roll_no') ? 'has-error':'' }}">
        {{ Form::label('roll_no ', 'Roll No :', ['class'=>'col-sm-2 control-label required'])}}
        <div class="col-sm-10">
            {!! Form::text('roll_no', null, array('placeholder' => 'Roll No','class' => 'form-control', 'autofocus')) !!}
        </div>
    </div>

    <div class="form-group  {{ $errors->has('photo') ? 'has-error':'' }}">
        {{ Form::label('photo', 'Images:', ['class'=>'col-sm-2 control-label'])}}
        <div class="col-sm-10">
            {!! Form::file('photo',  array('class' => 'form-control','multiple'=>true, 'id'=>'images')) !!}
        </div>
    </div>
    <div class="form-group  {{ $errors->has('remarks') ? 'has-error':'' }}">
        {{ Form::label('remarks', 'Remarks:', ['class'=>'col-sm-2 control-label'])}}
        <div class="col-sm-10">
            {!! Form::text('remarks', null, array('placeholder' => 'Remarks','class' => 'form-control', 'autofocus')) !!}
        </div>
    </div>
</div>
<div class="form-group  {{ $errors->has('user_name') ? 'has-error':'' }}">
    {{ Form::label('user_name', 'Username:', ['class'=>'col-sm-2 control-label required'])}}
    <div class="col-sm-10">
        {!! Form::text('user_name', null, array('placeholder' => 'Username','class' => 'form-control', 'autofocus')) !!}
    </div>
</div>
