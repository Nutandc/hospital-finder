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
                                   name="q"
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

@if(request()->get('q'))
    <div>
        <section class="services-section ftco-no-pt ftc-no-pb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 py-5">
                        <div class="row">
                            @forelse($searchResults as $hospital)
                                <div class="col-md-3 ftco-animate">
                                    <div class="media block-6 services border text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <img src="{{$hospital->image ?? asset('images/hospital.png')}}"
                                                 class="img img-responsive">
                                        </div>
                                        <div class="mt-3 media-body media-body-2">
                                            <h3 class="heading">{{$hospital->name}}</h3>
                                            <time> {{$hospital->opening_hour}}</time>
                                            {{--                                    <p>{{$hospital-/}}</p>--}}
                                        </div>
                                    </div>

                                </div>
                            @empty
                                <div class="mt-3 media-body media-body-2">

                                </div>
                            @endforelse
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
    </div>
@endif
<section class="services-section bg-light">
    <div class="container">
        <form action="{{route('symptoms-predicts')}}" method="post">
            @csrf
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-9 text-center heading-section ftco-animate">
                    <h2 class="mb-4">Select Symptoms</h2>
                    <select class="form-control m-1 select-2" name="symptoms">
                        <option selected>Select symptoms</option>
                        <option value="fever">Fever</option>
                        <option value="diarrhoea">Diarrhoea</option>
                        <option value="headache">Headache</option>
                    </select>
                </div>
                <div class="col-md-6 mt-2 pt-2">
                    <button type="submit" class="btn btn-primary btn-block btn-flat px-4 py-3">
                        Predict
                    </button>
                </div>
            </div>
        </form>

    </div>
</section>
@if(!request()->has('q'))

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
                                    <a href="#" class=" btn-primary px-4 py-3">
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
    <section class="services-section ftco-no-pt ftc-no-pb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 py-5">
                    <div class="heading-section ftco-animate mt-5">
                        <h2 class="mb-4">Hospitals Near By</h2>
                        {{--                        <p> Is to establish a seamless coordination and communication between Students - Teachers - Parents ---}}
                        {{--                            Management.</p>--}}
                        {{--                        <p>As we provide Relations, Stories and Magic in from of our School Solutions ERP.</p>--}}
                    </div>
                    {{--                    <h2 class="mb-4">Hospitals Near By</h2>--}}
                    {{--                    <p> Baneswor</p>--}}
                </div>
                <div class="col-lg-12 py-5">
                    <div class="row">
                        @forelse($hospitals as $hospital)
                            <div class="col-md-3 ftco-animate">
                                <div class="media block-6 services border text-center">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="{{$hospital->image ?? asset('images/hospital.png')}}"
                                             class="img img-responsive">
                                    </div>
                                    <div class="mt-3 media-body media-body-2">
                                        <h3 class="heading">{{$hospital->name}}</h3>
                                        <time> {{$hospital->opening_hour}}</time>
                                        {{--                                    <p>{{$hospital-/}}</p>--}}
                                    </div>
                                </div>

                            </div>
                        @empty
                            <div class="mt-3 media-body media-body-2">

                            </div>
                        @endforelse
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
@endif

@include('partials.footer')
