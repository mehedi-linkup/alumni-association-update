@section('footer')
    <div class="clearfix" style="padding-top: 20px">

    </div>
    <!--   footer section -->
    <div class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-6 offset-3">
                    <img src="{{ asset('uploads/web_footer/shurjoPay_Footer_1.png') }}" alt="" class="img-fluid banner-footer">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="about-us" style="font-family: kalpurush">
                        <h4>Ali Azam School & College</h4>
                        <p>
                            আলী আজম স্কুলের শতবার্ষিকী পালন উৎসবে আপনাকে স্বাগতম। সবার সহযোগীতা কামনা করছি।
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <h4>Quick Links</h4>
                    <div class="row">
{{--                        <div class="col-md-4 col-4">--}}
                            <ul>
                                <li><a href="{{route('/')}}">Home</a></li>
                                <li><a href="{{route('about-history',['type'=> 'History'])}}">About Us</a></li>
                                <li><a href="{{route('contact-us')}}">Contact Us</a></li>
                                <li><a href="{{route('school-gallery')}}">Gallery</a></li>
                                <li><a href="{{route('terms-conditions')}}">Terms and Conditions</a></li>
                                <li><a href="{{route('privacy-policy')}}">Privacy Policy</a></li>
                            </ul>
{{--                        </div>--}}

                    </div>
                </div>
                <div class="col-md-3">
                    <h4>Contact Info</h4>
                    <ul class="contactinfo">
                        <li>
                            <p><i class="fa fa-map-marker" style="color: red;"></i>&nbsp;78, Naya Palton, Shanjari Tower (1st Floor), Dhaka-1000, Bangladesh.</p>
                        </li>
                        <li>
                            <p><i class="fa fa-envelope-open-text" style="color: #e6bdbd;"></i> info@aahcalumni.org</p>
                        </li>
                        <li>
                            <p><i class="fa fa-phone" style="color: #1eb92a;"></i> 01511541043</p>
                        </li>

                    </ul>
                </div>
                <div class="col-md-3">
                    <h4>Follow Us</h4>
                    <ul class="social-icons p-0">
                        <li>
                            <a href="#" target="_blank" class="fb">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="" class="twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="" class="youtu">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                    </ul>

                    <div class="img-box">
                        <img src="{{asset('uploads/web_footer/shurjoPay_Footer_2.jpg')}}" alt="" class="img-fluid">
                    </div>
                </div>


            </div>
        </div>
        <div class="copyright">
            <div class="float-left">
                Copyright © {{date('Y')}} Ali Azam School & College Alumni Association
            </div>
            <div class="float-lg-right">
                Design & Developed by | <a target="_blank" href="https://www.bigsoftwareltd.com">Big Technology Limited</a>
            </div>
{{--            Copyright © 2020 --}}
            <div class="clearfix" style="margin-bottom: 0">

            </div>
        </div>
    </div>
<section class="container">
    <button onclick="topFunction()" class="up-button" id="myBtn" title="Go to top"><i class="fas fa-angle-up"></i></button>
</section>
    <!-- End  footer section -->
@endsection
