<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 bg-primary p-4">
                    <h2 class="ftco-heading-2">Hospital Finder</h2>
                    <ul class="ftco-footer-social list-unstyled mb-0">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Services</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">AI based recommendation</a></li>
                        {{--                        <li><a href="#" class="py-2 d-block">Multi-School</a></li>--}}
                        <li><a href="#" class="py-2 d-block">Free to use</a></li>
                        {{--                        <li><a href="#" class="py-2 d-block"></a></li>--}}
                    </ul>
                </div>
            </div>
            <div class="col-md">
                {{--                <div class="ftco-footer-widget mb-4">--}}
                {{--                    <h2 class="ftco-heading-2">Why eVidyalays?</h2>--}}
                {{--                    <ul class="list-unstyled">--}}
                {{--                        <li><a href="#" class="py-2 d-block">Custom ERP</a></li>--}}
                {{--                        <li><a href="#" class="py-2 d-block">Our Story</a></li>--}}
                {{--                        <li><a href="#" class="py-2 d-block">Media & Press</a></li>--}}
                {{--                        <li><a href="#" class="py-2 d-block">Why School Management Software?</a></li>--}}
                {{--                    </ul>--}}
                {{--                </div>--}}
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Help</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                        <li><a href="#" class="py-2 d-block">Guide</a></li>
                        <li><a href="#" class="py-2 d-block">FAQs</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Office</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <!--li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li-->
                            <li><a href="#"><span class="icon icon-phone"></span><span
                                        class="text">+91 63 666 32456</span></a></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span
                                        class="text">+977 63 666 32456</span></a>
                            </li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@evidylays.com</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center text-white">
                Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script>
                <div class="text-white">
                    All rights reserved<i class="icon-heart" aria-hidden="true"></i> by <a
                        href="{{url('/')}}" target="_blank">Hospital Finder</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ URL::asset('js/popper.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.easing.1.3.js') }}"></script>
<script src="{{ URL::asset('js/jquery.waypoints.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.stellar.min.js') }}"></script>
<script src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ URL::asset('js/aos.js') }}"></script>
<script src="{{ URL::asset('js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-datepicker.js') }}"></script>
{{--    <script src="{{ URL::asset('js/jquery.timepicker.min.js') }}"></script>--}}
<script src="{{ URL::asset('js/scrollax.min.js') }}"></script>
<script src="{{ URL::asset('js/main.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#predictionForm').on('submit', function (e) {
            e.preventDefault();
            let URL = $(document.activeElement).val();
            $.ajax({
                method: 'GET',
                data: {
                    's1': $('select[name="s1"]').val(),
                    's2': $('select[name="s2"]').val(),
                    's3': $('select[name="s3"]').val(),
                    's4': $('select[name="s4"]').val(),
                    's5': $('select[name="s5"]').val(),
                },
                url: '{{config('app.python_url')}}' + '/' + URL,
                success: function (response) {
                    let template = `
                        <div class="card-footer border-0 look_for_hospital" style="background-color: #fafafa;">
                        <button class="btn btn-primary btn-block btn-flat px-4 py-3"
                         id="look_for_hospital">Look For a Hospital ? </button>
                        </div>
                        `
                    // $('.p.card-title').html(`<!--<h1></h1>-->`);
                    $('.services-section').find('.look_for_hospital').remove();
                    $('.p.card-body').html(`<h3>${response.disease}<h1>`).after($(template));

                }, error: function (error) {
                }
            })
        })
        $.ajax({
            method: 'GET',
            url: '{{config('app.python_url')}}' + '/getAllSymptoms',
            success: function (response) {
                if (typeof response === 'object') {
                    $.each(response, function (i, p) {
                        $('.select-2').append($('<option></option>')
                            .val(p)
                            .html(p.toUpperCase().split('_').join(' ')));
                    });
                }
            }, error: function (error) {
            }
        })
    })
</script>
