@include('partials.header')
    <div class="hero-wrap js-fullheight">
        <div class="overlay"></div>
        <div class="container-fluid px-0">
            <div class="row d-md-flex no-gutters slider-text align-items-center js-fullheight justify-content-end">
            <img class="one-third js-fullheight align-self-end order-md-last img-fluid"
                 src="{{asset('images/below-header.jpg')}}" alt="">
                <div class="one-forth d-flex align-items-center ftco-animate js-fullheight">
                    <div class="text mt-5">
                    <form>
                        <div class="mb-5">
                            <input type="text" class="form-control"
                                   autofocus
                                   name="h"
                                   placeholder="Search hospitals ......."
                                   style="border-color:blue;height:65px !important; ">
                        </div>
                        <p>
                            <button type="submit" class="btn btn-primary btn-block btn-flat px-4 py-3">
                                Search Hospitals
                            </button>
                        </p>
                    </form>
                </div>
                    </div>
                </div>
            </div>
        </div>

<section class="services-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-12 text-center heading-section ftco-animate">
                <h2 class="mb-4">Select Symptoms</h2>
                <select class="form-control m-1 select-2">
                    <option>11</option>
                </select>
                <select class="form-control m-1 select-2">

                </select>
                <select class="form-control m-1 select-wrap">

                </select>

            </div>
            <div class="col-md-6 mt-2 pt-2">
                <button type="submit" class="btn btn-primary btn-block btn-flat px-4 py-3">
                    Predict
                </button>
    </div>
        </div>
        {{--        <div class="row">--}}
        {{--            <div class="col-md-6 d-flex align-self-stretch ftco-animate">--}}
        {{--                <div class="media block-6 services d-flex align-items-center">--}}
        {{--                    <div class="icon d-flex align-items-center justify-content-center order-md-last">--}}
        {{--                        <span class="flaticon-cloud"></span>--}}
        {{--                    </div>--}}
        {{--                    <div class="media-body pl-4 pl-md-0 pr-md-4 text-md-right">--}}
        {{--                        <h3 class="heading">AI Based Prediction</h3>--}}
        {{--                        <p class="mb-0">We run your quires on various ai model--}}
        {{--                            that helps to predict your disease more--}}
        {{--                            accurately</p>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <div class="col-md-6 d-flex align-self-stretch ftco-animate">--}}
        {{--                <div class="media block-6 services d-flex align-items-center">--}}
        {{--                    <div class="icon d-flex align-items-center justify-content-center">--}}
        {{--                        <span class="flaticon-server"></span>--}}
        {{--                    </div>--}}
        {{--                    <div class="media-body pl-4">--}}
        {{--                        <h3 class="heading">Nearest Hospitals</h3>--}}
        {{--                        <p class="mb-0">--}}
        {{--                            We provide the list of the hospitals which are near by your location--}}
        {{--                        </p>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <div class="col-md-6 d-flex align-self-stretch ftco-animate">--}}
        {{--                <div class="media block-6 services d-flex align-items-center">--}}
        {{--                    <div class="icon d-flex align-items-center justify-content-center order-md-last">--}}
        {{--                        <span class="flaticon-customer-service"></span>--}}
        {{--                    </div>--}}
        {{--                    <div class="media-body pl-4 pl-md-0 pr-md-4 text-md-right">--}}
        {{--                        <h3 class="heading">Choose hospitals</h3>--}}
        {{--                        <p>--}}
        {{--                            You can choose any hospitals of your desired .--}}
        {{--                        </p>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <div class="col-md-6 d-flex align-self-stretch ftco-animate">--}}
        {{--                <div class="media block-6 services d-flex align-items-center">--}}
        {{--                    <div class="icon d-flex align-items-center justify-content-center">--}}
        {{--                        <span class="flaticon-life-insurance"></span>--}}
        {{--                    </div>--}}
        {{--                    <div class="media-body pl-4">--}}
        {{--                        <h3 class="heading">Free to Use</h3>--}}
        {{--                        <p>Users are free to use this services any time from anywhere.</p>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}

        {{--        </div>--}}
    </div>
</section>

    <section class="ftco-section services-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 text-center heading-section ftco-animate">
                <h2 class="mb-4">Why Us ?</h2>
                <p>
                    We try to predict the disease according to your inputs and
                    recommend you the nearest hospitals.
                    You can also search the hospital by their name, doctors,disease.


                </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-flex align-items-center">
                        <div class="icon d-flex align-items-center justify-content-center order-md-last">
                            <span class="flaticon-cloud"></span>
                        </div>
                        <div class="media-body pl-4 pl-md-0 pr-md-4 text-md-right">
                        <h3 class="heading">AI Based Prediction</h3>
                        <p class="mb-0">We run your quires on various ai model
                            that helps to predict your disease more
                            accurately</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-flex align-items-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="flaticon-server"></span>
                        </div>
                        <div class="media-body pl-4">
                        <h3 class="heading">Nearest Hospitals</h3>
                        <p class="mb-0">
                            We provide the list of the hospitals which are near by your location
                        </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-flex align-items-center">
                        <div class="icon d-flex align-items-center justify-content-center order-md-last">
                            <span class="flaticon-customer-service"></span>
                        </div>
                        <div class="media-body pl-4 pl-md-0 pr-md-4 text-md-right">
                        <h3 class="heading">Choose hospitals</h3>
                        <p>
                            You can choose any hospitals of your desired .
                        </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-flex align-items-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="flaticon-life-insurance"></span>
                        </div>
                        <div class="media-body pl-4">
                        <h3 class="heading">Free to Use</h3>
                        <p>Users are free to use this services any time from anywhere.</p>
                    </div>
                </div>
                        </div>

            </div>
        </div>
    </section>

    <section class="ftco-section ftco-counter img" id="section-counter">
        <div class="container">
            <div class="row justify-content-center">
                <div class="">
                    <div class="row">
                        <div class="counter-wrap ftco-animate">
                            <div class="">
                                <div class="text">
                                <strong class="number" data-number="50"></strong>
                                <span>+ hospitals are registered with us </span>
                                <a href="contact.html" class=" btn-primary px-4 py-3">
                                    List all hospitals
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-no-pt ftc-no-pb">
        <div class="container">
            <div class="row">
            {{--            <div class="col-lg-6 py-5">--}}
            {{--                <img src="images/undraw_podcast_q6p7.svg" class="img-fluid" alt="">--}}
                    <div class="heading-section ftco-animate mt-5">
                <h2 class="mb-4">Hospitals Near By</h2>
                <p> Baneswor</p>
                </div>
            <div class="col-lg-12 py-5">
                    <div class="row">
                    <div class="col-md-3 ftco-animate">
                            <div class="media block-6 services border text-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="flaticon-cloud-computing"></span>
                                </div>
                                <div class="mt-3 media-body media-body-2">
                                    <h3 class="heading">On Cloud</h3>
                                    <p>Accessible on your finger tips with Web, iOS & Android Apps</p>
                                </div>
                            </div>
                        </div>
                    {{--                    <div class="col-md-3 ftco-animate">--}}
                    {{--                        <div class="media block-6 services border text-center">--}}
                    {{--                            <div class="icon d-flex align-items-center justify-content-center">--}}
                    {{--                                <span class="flaticon-cloud"></span>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="mt-3 media-body media-body-2">--}}
                    {{--                                <h3 class="heading">Connect</h3>--}}
                    {{--                                <p>Single app for Parents, Teachers, Students and Management</p>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="col-md-3 ftco-animate">--}}
                    {{--                        <div class="media block-6 services border text-center">--}}
                    {{--                            <div class="icon d-flex align-items-center justify-content-center">--}}
                    {{--                                <span class="flaticon-database"></span>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="mt-3 media-body media-body-2">--}}
                    {{--                                <h3 class="heading">Dedicated</h3>--}}
                    {{--                                <p>Customized and themed based on your choice and needs</p>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="col-md-3 ftco-animate">--}}
                    {{--                        <div class="media block-6 services border text-center">--}}
                    {{--                            <div class="icon d-flex align-items-center justify-content-center">--}}
                    {{--                                <span class="flaticon-server"></span>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="mt-3 media-body media-body-2">--}}
                    {{--                                <h3 class="heading">Usability</h3>--}}
                    {{--                                <p>Ease while navigating through application with tonnes of features</p>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
{{--<section class="ftco-section bg-light">--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center mb-5 pb-5">--}}
{{--            <div class="col-md-7 text-center heading-section ftco-animate">--}}
{{--                <span class="subheading">Beneifits of</span>--}}
{{--                <h2 class="mb-4">Amazing School ERP</h2>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12 nav-link-wrap mb-5 pb-md-5 pb-sm-1 ftco-animate">--}}
{{--                <div class="nav ftco-animate nav-pills justify-content-center text-center" id="v-pills-tab"--}}
{{--                     role="tablist" aria-orientation="vertical">--}}
{{--                    <a class="nav-link active" id="v-pills-nextgen-tab" data-toggle="pill" href="#v-pills-nextgen"--}}
{{--                       role="tab" aria-controls="v-pills-nextgen" aria-selected="true">Ease</a>--}}

{{--                    <a class="nav-link" id="v-pills-performance-tab" data-toggle="pill" href="#v-pills-performance"--}}
{{--                       role="tab" aria-controls="v-pills-performance" aria-selected="false">Performance</a>--}}

{{--                    <a class="nav-link" id="v-pills-effect-tab" data-toggle="pill" href="#v-pills-effect" role="tab"--}}
{{--                       aria-controls="v-pills-effect" aria-selected="false">Effectiveness</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-12 align-items-center ftco-animate">--}}

{{--                <div class="tab-content ftco-animate" id="v-pills-tabContent">--}}

{{--                    <div class="tab-pane fade show active" id="v-pills-nextgen" role="tabpanel"--}}
{{--                         aria-labelledby="v-pills-nextgen-tab">--}}
{{--                        <div class="d-md-flex">--}}
{{--                            <div class="one-forth align-self-center">--}}
{{--                                <img src="images/undraw_laravel_and_vue_59tp.svg" class="img-fluid" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="one-half ml-md-5 align-self-center">--}}
{{--                                <h2 class="mb-4">Simple and Easy to Use</h2>--}}
{{--                                <p>Designed to engage teachers and parents. No expertise required to accomplish a task--}}
{{--                                    quickly.</p>--}}
{{--                                <p><a href="#" class="btn btn-primary py-3">Get in touch</a></p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="tab-pane fade" id="v-pills-performance" role="tabpanel"--}}
{{--                         aria-labelledby="v-pills-performance-tab">--}}
{{--                        <div class="d-md-flex">--}}
{{--                            <div class="one-forth order-last align-self-center">--}}
{{--                                <img src="images/undraw_visual_data_b1wx.svg" class="img-fluid" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="one-half order-first mr-md-5 align-self-center">--}}
{{--                                <h2 class="mb-4">Powerful features for your Institution</h2>--}}
{{--                                <p>We provide everything you will ever need to run an education institution--}}
{{--                                    successfully. No--}}
{{--                                    customization required.</p>--}}
{{--                                <p><a href="#" class="btn btn-primary py-3">Get in touch</a></p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="tab-pane fade" id="v-pills-effect" role="tabpanel" aria-labelledby="v-pills-effect-tab">--}}
{{--                        <div class="d-md-flex">--}}
{{--                            <div class="one-forth align-self-center">--}}
{{--                                <img src="images/undraw_business_plan_5i9d.svg" class="img-fluid" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="one-half ml-md-5 align-self-center">--}}
{{--                                <h2 class="mb-4">One System, One Dashboard</h2>--}}
{{--                                <p>That seamlessly connects Students, Parents, Teachers and Key Stakeholders across all--}}
{{--                                    systems and--}}
{{--                                    devices.</p>--}}
{{--                                <p><a href="#" class="btn btn-primary py-3">Get in touch</a></p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
{{--<section class="ftco-section ftco-partner">--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center mb-5 pb-5">--}}
{{--            <div class="col-md-7 text-center heading-section ftco-animate">--}}
{{--                <!--span class="subheading">Beneifits of</span-->--}}
{{--                <h2 class="mb-4">eVidyalays in the Media</h2>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="col-sm ftco-animate">--}}
{{--                <a href="#" class="partner"><img src="images/partner-1.png" class="img-fluid"--}}
{{--                                                 alt="Colorlib Template"></a>--}}
{{--            </div>--}}
{{--            <div class="col-sm ftco-animate">--}}
{{--                <a href="#" class="partner"><img src="images/partner-2.png" class="img-fluid"--}}
{{--                                                 alt="Colorlib Template"></a>--}}
{{--            </div>--}}
{{--            <div class="col-sm ftco-animate">--}}
{{--                <a href="#" class="partner"><img src="images/partner-3.png" class="img-fluid"--}}
{{--                                                 alt="Colorlib Template"></a>--}}
{{--            </div>--}}
{{--            <div class="col-sm ftco-animate">--}}
{{--                <a href="#" class="partner"><img src="images/partner-4.png" class="img-fluid"--}}
{{--                                                 alt="Colorlib Template"></a>--}}
{{--            </div>--}}
{{--            <div class="col-sm ftco-animate">--}}
{{--                <a href="#" class="partner"><img src="images/partner-5.png" class="img-fluid"--}}
{{--                                                 alt="Colorlib Template"></a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
@include('partials.footer')
