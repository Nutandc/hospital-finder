@extends('backend::layouts.master')
@section('header')
    Dashboard
@stop
@section('subHeader')
    Dashboard view
@stop
@section('breadcrumb')
    {{--    {{ Breadcrumbs::render('dashboard.index',$routePrefix) }}--}}
@stop
@section('content')
    @include('backend::partials.errors')
    <div class="row">
        <section class="content" wfd-id="111">
            <!-- Info boxes -->
            <div class="row" wfd-id="370">
                <div class="col-md-3 col-sm-6 col-xs-12" wfd-id="390">
                    <div class="info-box" wfd-id="391">
                        <span class="info-box-icon bg-aqua" wfd-id="395"><i class="fa fa-h-square"></i></span>

                        <div class="info-box-content" wfd-id="392">
                            <span class="info-box-text" wfd-id="394">NO OF HOSPITAL</span>
                            <span class="info-box-number" wfd-id="393">{{Modules\Backend\Entities\Hospital::count()}}<small></small></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12" wfd-id="384">
                    <div class="info-box" wfd-id="385">
                        <span class="info-box-icon bg-red" wfd-id="389"><i class="fa fa-user-md"></i></span>

                        <div class="info-box-content" wfd-id="386">
                            <span class="info-box-text" wfd-id="388">NO OF DOCTOR</span>
                            <span class="info-box-number" wfd-id="387">41,410</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block" wfd-id="383"></div>

                <div class="col-md-3 col-sm-6 col-xs-12" wfd-id="377">
                    <div class="info-box" wfd-id="378">
                        <span class="info-box-icon bg-green" wfd-id="382"><i
                                class="fa fa-medkit"></i></span>

                        <div class="info-box-content" wfd-id="379">
                            <span class="info-box-text" wfd-id="381">NO OF DISEASE</span>
                            <span class="info-box-number" wfd-id="380">760</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12" wfd-id="371">
                    <div class="info-box" wfd-id="372">
                        <span class="info-box-icon bg-yellow" wfd-id="376"><i
                                class="fa fa-wheelchair"></i></span>

                        <div class="info-box-content" wfd-id="373">
                            <span class="info-box-text" wfd-id="375">NO OF SYMPTOMS</span>
                            <span class="info-box-number" wfd-id="374">2,000</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
        </section>
    </div>
@endsection
@push('scripts')
@endpush
