@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb" class="w-100 float-left">
        <ol class="breadcrumb parallax justify-content-center" data-source-url="{{ asset('assets/img/banner/parallax.jpg') }}"
            style="background-image: url('{{ asset('assets/img/banner/parellex-bg.jpg') }}'); background-position: 50% 0.809717%;">
            <h1 class="text-center" style="color: whitesmoke">Contact Us</h1>
        </ol>
    </nav>
    <div class="main-content w-100 float-left">
        <div class="container">
            <div class="row">
                <!--Google map-->
                <div id="map-container-google-1" class="z-depth-1-half map-container col-sm-12 mb-50" style="height: 500px">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2373.4543763267293!2d-2.2443951430541027!3d53.496078207923645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487bb1ca5c3f2b39%3A0xdc542f6c5f88788f!2s34%20Broughton%20St%2C%20Cheetham%20Hill%2C%20Manchester%20M8%208NN%2C%20UK!5e0!3m2!1sen!2s!4v1719293059538!5m2!1sen!2s"
                        width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <!--Google Maps-->
                <div class="contact-form-area col-sm-7">
                    <div class="contact-form-inner">
                        <h4 class="text-capitalize">Tell us your Order</h4>
                        <form id="contact-form" action="{{ route('contact.submit') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="name" class="float-left">Name<span class="required">*</span></label>
                                    <input type="text" name="name" id="name" class="float-right" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="email" class="float-left">Email<span class="required">*</span></label>
                                    <input type="text" name="email" id="email" class="float-right" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="subject" class="float-left">Subject<span class="required">*</span></label>
                                    <input type="text" name="subject" id="subject" class="float-right" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="message" class="float-left">Message</label>
                                    <textarea name="message" id="message" class="float-right"></textarea>
                                </div>
                            </div>
                            <input type="submit" class="submit-btn default-btn btn-primary btn" value="Send Email">
                            <p class="form-messege"></p>
                        </form>
                    </div>
                </div>
                <div class="contact-address col-sm-5">
                    <div class="contact-inner float-left w-100">
                        <div class="contact-information">
                            <h4 class="text-capitalize">contact us</h4>

                            <p>Originally known as B-girl we are a well-established fashion wholesale supplier for women
                                based in the heart of Manchester. We specialise in supplying the latest fresh catwalk trends
                                to a wide range of retail businesses and boutiques. With over 20 years of experience in
                                women’s wholesale boutique clothing and a rapidly growing reputation, our customers love us
                                for our stylish and affordable high-quality women’s wholesale fashion as well as our passion
                                for ensuring the best customer service and support.</p>
                            <div class="contact-wrapper">
                                <div class="contact-list">
                                    <i class="material-icons"style="color: #2d2d2d">place</i>
                                    <span>Address : 34 Broughton Street, Manchester , United Kingdom</span>
                                </div>
                                <div class="contact-list">
                                    <i class="material-icons"style="color: #2d2d2d">call</i>
                                    <span>poshmarktradinguk@gmail.com</span>
                                </div>
                                <div class="contact-list">
                                    <i class="material-icons" style="color: #2d2d2d">email</i>
                                    <span>+447534300611</span>
                                </div>
                            </div>
                        </div>
                        <div class="working-time">
                            <h5>Working hours</h5>
                            <div>
                                <div>Sunday – Friday</div>
                                <div>10AM – 06PM</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/5ac1aabb4b401e45400e4197/default';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
@endsection
