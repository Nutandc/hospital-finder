<div class="box-header filterHeader">
    @if(isset($filterBy))
        <div class="col-md-1">
            {{ Form::label('filter_by', 'Filter by:')}}
        </div>
        @if(is_array($filterBy))
            @foreach($filterBy as $key=>$filter)
                <div class="form-group col-md-3 ">
                    {!! Form::select($key, $filter, request()->get($key) ,
                         array('placeholder' => ucwords(str_replace('_',' ',$key)),
                    'class' => 'form-control  select2', 'style'=>'width:100%;')) !!}
                </div>
            @endforeach
        @endif
    @endif
</div>
