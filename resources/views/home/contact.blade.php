@extends('layouts.layout')
@include('layouts.menu')
<!-- MAKE AN APPOINTMENT -->
<section id="appointment" data-stellar-background-ratio="3">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-sm-6">
                <img src="images/news-image1.jpg" class="img-responsive" alt="">
            </div>

            <div class="col-md-6 col-sm-6">
                <!-- CONTACT FORM HERE -->
                <form id="appointment-form" role="form" method="post" action="#">

                    <!-- SECTION TITLE -->
                    <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                        <h2>Contact Us</h2>
                    </div>

                    <div class="wow fadeInUp" data-wow-delay="0.8s">

                        <div class="col-md-8 col-sm-8">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Full Name">
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Your Email">
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <label for="Message">Message</label>
                            <textarea class="form-control" rows="5" id="message" name="message" placeholder="Message"></textarea>
                            <button type="submit" class="form-control" id="cf-submit" name="submit">Contact
                                Us</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
@include('layouts.footer')
