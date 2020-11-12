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
                        <span class="info-box-icon bg-aqua" wfd-id="395"><i class="ion icon-user"></i></span>

                        <div class="info-box-content" wfd-id="392">
                            <span class="info-box-text" wfd-id="394">NO OF HOSPITAL</span>
                            <span class="info-box-number" wfd-id="393">5<small></small></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12" wfd-id="384">
                    <div class="info-box" wfd-id="385">
                        <span class="info-box-icon bg-red" wfd-id="389"><i class="fa fa-google-plus"></i></span>

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
                                class="ion ion-ios-cart-outline"></i></span>

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
                                class="ion ion-ios-people-outline"></i></span>

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
            <!-- /.row -->

            <div class="row" wfd-id="320">
                <div class="col-md-12" wfd-id="321">
                    <div class="box" wfd-id="322">
                        <div class="box-header with-border" wfd-id="366">
                            <h3 class="box-title">Monthly Recap Report</h3>

                            <div class="box-tools pull-right" wfd-id="367">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse" wfd-id="508"><i
                                        class="fa fa-minus"></i>
                                </button>
                                <div class="btn-group" wfd-id="368">
                                    <button type="button" class="btn btn-box-tool dropdown-toggle"
                                            data-toggle="dropdown" wfd-id="507">
                                        <i class="fa fa-wrench"></i></button>
                                    <ul class="dropdown-menu" role="menu" wfd-id="369">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <button type="button" class="btn btn-box-tool" data-widget="remove" wfd-id="506"><i
                                        class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" wfd-id="341">
                            <div class="row" wfd-id="342">
                                <div class="col-md-8" wfd-id="364">
                                    <p class="text-center">
                                        <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                                    </p>

                                    <div class="chart" wfd-id="365">
                                        <!-- Sales Chart Canvas -->
                                        <canvas id="salesChart" style="height: 180px; width: 703px;" height="180"
                                                width="703"></canvas>
                                    </div>
                                    <!-- /.chart-responsive -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-4" wfd-id="343">
                                    <p class="text-center">
                                        <strong>Goal Completion</strong>
                                    </p>

                                    <div class="progress-group" wfd-id="359">
                                        <span class="progress-text" wfd-id="363">Add Products to Cart</span>
                                        <span class="progress-number" wfd-id="362"><b>160</b>/200</span>

                                        <div class="progress sm" wfd-id="360">
                                            <div class="progress-bar progress-bar-aqua" style="width: 80%"
                                                 wfd-id="361"></div>
                                        </div>
                                    </div>
                                    <!-- /.progress-group -->
                                    <div class="progress-group" wfd-id="354">
                                        <span class="progress-text" wfd-id="358">Complete Purchase</span>
                                        <span class="progress-number" wfd-id="357"><b>310</b>/400</span>

                                        <div class="progress sm" wfd-id="355">
                                            <div class="progress-bar progress-bar-red" style="width: 80%"
                                                 wfd-id="356"></div>
                                        </div>
                                    </div>
                                    <!-- /.progress-group -->
                                    <div class="progress-group" wfd-id="349">
                                        <span class="progress-text" wfd-id="353">Visit Premium Page</span>
                                        <span class="progress-number" wfd-id="352"><b>480</b>/800</span>

                                        <div class="progress sm" wfd-id="350">
                                            <div class="progress-bar progress-bar-green" style="width: 80%"
                                                 wfd-id="351"></div>
                                        </div>
                                    </div>
                                    <!-- /.progress-group -->
                                    <div class="progress-group" wfd-id="344">
                                        <span class="progress-text" wfd-id="348">Send Inquiries</span>
                                        <span class="progress-number" wfd-id="347"><b>250</b>/500</span>

                                        <div class="progress sm" wfd-id="345">
                                            <div class="progress-bar progress-bar-yellow" style="width: 80%"
                                                 wfd-id="346"></div>
                                        </div>
                                    </div>
                                    <!-- /.progress-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- ./box-body -->
                        <div class="box-footer" wfd-id="323">
                            <div class="row" wfd-id="324">
                                <div class="col-sm-3 col-xs-6" wfd-id="337">
                                    <div class="description-block border-right" wfd-id="338">
                                        <span class="description-percentage text-green" wfd-id="340"><i
                                                class="fa fa-caret-up"></i> 17%</span>
                                        <h5 class="description-header">$35,210.43</h5>
                                        <span class="description-text" wfd-id="339">TOTAL REVENUE</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-3 col-xs-6" wfd-id="333">
                                    <div class="description-block border-right" wfd-id="334">
                                        <span class="description-percentage text-yellow" wfd-id="336"><i
                                                class="fa fa-caret-left"></i> 0%</span>
                                        <h5 class="description-header">$10,390.90</h5>
                                        <span class="description-text" wfd-id="335">TOTAL COST</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-3 col-xs-6" wfd-id="329">
                                    <div class="description-block border-right" wfd-id="330">
                                        <span class="description-percentage text-green" wfd-id="332"><i
                                                class="fa fa-caret-up"></i> 20%</span>
                                        <h5 class="description-header">$24,813.53</h5>
                                        <span class="description-text" wfd-id="331">TOTAL PROFIT</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-3 col-xs-6" wfd-id="325">
                                    <div class="description-block" wfd-id="326">
                                        <span class="description-percentage text-red" wfd-id="328"><i
                                                class="fa fa-caret-down"></i> 18%</span>
                                        <h5 class="description-header">1200</h5>
                                        <span class="description-text" wfd-id="327">GOAL COMPLETIONS</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Main row -->
            <!-- /.row -->
        </section>
    </div>
@endsection
@push('scripts')
@endpush
