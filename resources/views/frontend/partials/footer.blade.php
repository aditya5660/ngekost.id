<!-- Footer start -->
<footer class="footer">
        <div class="container footer-inner">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-item clearfix">
                        <img src="{{asset('logo/logo-blue.png')}}" alt="logo" class="f-logo">
                        <div class="text">
                            <p>{{$settings->footer}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-item">
                        <h4>Contact Us</h4>
                        <div class="f-border"></div>
                        <ul class="contact-info">
                            <li>
                                <i class="flaticon-pin"></i>{{$settings->address}}
                            </li>
                            <li>
                                <i class="flaticon-mail"></i><a href="mailto:{{$settings->email}}">{{$settings->email}}</a>
                            </li>
                            <li>
                                <i class="flaticon-phone"></i><a href="tel:{{$settings->phone}}">{{$settings->phone}}</a>
                            </li>
                            <li>
                                <i class="fa fa-whatsapp"></i><a href="https://api.whatsapp.com/send?phone=6285334376496">+6285334376496</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-item">
                        <h4>
                            Useful Links
                        </h4>
                        <div class="f-border"></div>
                        <ul class="links">
                            <li>
                                <a href="{{route('home')}}">Home</a>
                            </li>
                            <li>
                                <a href="{{route('about')}}">Tentang Kami</a>
                            </li>
                            <li>
                                <a href="#">Karir</a>
                            </li>
                            <li>
                                <a href="{{route('login')}}">Login</a>
                            </li>
                            <li>
                                <a href="#">Syarat Pengguna</a>
                            </li>
                            <li>
                                <a href="#">Kebijakan Privasi</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-item clearfix">
                        <h4>Find Us On Playstore</h4>
                        <a href="">
                            <img src="{{asset('logo/playstore.png')}}" srcset="" width="200">
                        </a>

                    </div>
                    <div class="footer-item clearfix">
                        <h4>Subscribe</h4>
                        <div class="f-border"></div>
                        <div class="Subscribe-box">
                            <form class="form-inline" action="#" method="GET">
                                <input type="text" class="form-control mb-sm-0" id="inlineFormInputName3" placeholder="Email Address">
                                <button type="submit" class="btn"><i class="fa fa-paper-plane"></i></button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    <!-- Footer end -->

    <!-- Sub footer start -->
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                <p class="copy">©2019 <a href="#">{{$settings->name}}</a> Develop by <a href="https://codeinaja.net">Codeinaja.net</a></p>
                </div>
                <div class="col-lg-4 col-md-4">
                    <ul class="social-list clearfix">
                        <li><a href="{{$settings->facebook}}" class="facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="{{$settings->twitter}}" class="twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="{{$settings->linkedin}}" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Sub footer end -->
