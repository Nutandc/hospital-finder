@if ($message = Session::get('success'))
    <div class="box-body" style="padding-left: 0; padding-right: 0;">
        <div class="alert alert-success alert-dismissible no-margin">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            {!! $message !!}
        </div>
    </div>
@endif

@if ($message = Session::get('failed'))
    <div class="box-body" style="padding-left: 0; padding-right: 0;">
        <div class="alert alert-danger alert-dismissible no-margin">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-exclamation"></i> Error!</h4>
            {!! $message !!}
        </div>
    </div>
@endif
@if ($message = Session::get('error'))
    <div class="box-body" style="padding-left: 0; padding-right: 0;">
        <div class="alert alert-danger alert-dismissible no-margin">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-exclamation"></i> Error!</h4>
            {!! $message !!}
        </div>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="box-body" style="padding-left: 0; padding-right: 0;">
        <div class="alert alert-warning alert-dismissible no-margin">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning "></i> Warning !</h4>
            {!! $message !!}
        </div>
    </div>
@endif

@if ($message = Session::get('unauthorized'))
    <div class="box-body" style="padding-left: 0; padding-right: 0;">
        <div class="alert alert-danger alert-dismissible no-margin">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Unauthorized Access!</h4>
            {!! $message !!}
        </div>
    </div>
@endif

<div class="box-body jquery-purpose-error" style="padding-left: 0; padding-right: 0; display: none">
    <div class="alert alert-danger alert-dismissible no-margin">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-exclamation"></i> Error!</h4>
        <span class="error-message"></span>
    </div>
</div>

@if ($message = Session::get('automatic_voucher_warning'))
    <div class="box-body" style="padding-left: 0; padding-right: 0;">
        <div class="alert alert-warning alert-dismissible no-margin">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning ">
                </i> Automatic Voucher Warning !
                <span style="font-size: 13px">
                     &nbsp;&nbsp; ( Please Setup the required field before generating the automatic voucher or create voucher manually. )
                </span>
            </h4>

            {!! $message !!}
        </div>
    </div>
@endif
@if ($message = Session::get('PROCEDURE_NOT_FOUND'))
    <div class="box-body" style="padding-left: 0; padding-right: 0;">
        <div class="alert alert-warning alert-dismissible no-margin">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning ">
                </i> Something Went Wrong!
                <span style="font-size: 13px">
                </span>
            </h4>

            {{--            {!! $message !!}--}}
        </div>
    </div>
@endif


@if ($message = Session::get('fiscal_year_required'))
    @include('backend.partials.fiscal-year-required',['message'=>$message,'routePrefix'=>$routePrefix])
@endif

@if ($message = Session::get('no_current_budget'))
    <div class="box-body" style="padding-left: 0; padding-right: 0;">
        <div class="alert alert-info alert-dismissible no-margin">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-info "></i> Current budget timeline not found!!</h4>
            <a href="{{ generateRoute(('budget-time-lines.index'))}}"> Click Here </a> to create or select current
            budget timeline.
        </div>
    </div>
@endif

@if ($message = Session::get('asset_start_date'))
    <div class="box-body" style="padding-left: 0; padding-right: 0;">
        <div class="alert alert-info alert-dismissible no-margin">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-info "></i>{{$message}}</h4>
            <a href="{{ generateRoute(('settings.application-setting'))}}"> Click Here </a> to create asset start date
        </div>
    </div>
@endif


