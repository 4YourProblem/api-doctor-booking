@extends('layouts.layout')
@include('layouts.menu')
<!-- HOME -->
<section id="home" class="slider" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">

            <div class="owl-carousel owl-theme">
                <div class="item item-first">
                    <div class="caption">
                        <div class="col-md-offset-1 col-md-10">
                            <h3>Let's make your life happier</h3>
                            <h1>Healthy Living</h1>
                            <a href="#team" class="section-btn btn btn-default smoothScroll">Meet Our
                                Doctors</a>
                        </div>
                    </div>
                </div>

                <div class="item item-second">
                    <div class="caption">
                        <div class="col-md-offset-1 col-md-10">
                            <h3>Aenean luctus lobortis tellus</h3>
                            <h1>New Lifestyle</h1>
                            <a href="#about" class="section-btn btn btn-default btn-gray smoothScroll">More
                                About Us</a>
                        </div>
                    </div>
                </div>

                <div class="item item-third">
                    <div class="caption">
                        <div class="col-md-offset-1 col-md-10">
                            <h3>Pellentesque nec libero nisi</h3>
                            <h1>Your Health Benefits</h1>
                            <a href="#news" class="section-btn btn btn-default btn-blue smoothScroll">Read
                                Stories</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- ABOUT -->
<section id="about">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-sm-6">
                <div class="about-info">
                    <h2 class="wow fadeInUp" data-wow-delay="0.6s">Welcome to Your <br>Doctor Hunt</h2>
                    <div class="wow fadeInUp" data-wow-delay="0.8s">
                        <p>A booking doctor website is an online platform that allows patients to schedule appointments
                            with doctors, specialists, or other medical professionals. It offers a user-friendly
                            interface that enables patients to search for healthcare providers based on various criteria
                            such as location, specialty, availability, and ratings.</p>
                        <p>The website simplifies the process of booking doctor appointments, making it easy for
                            patients to schedule appointments at their convenience. Some booking doctor websites also
                            provide telemedicine consultations, prescription refills, appointment reminders, and health
                            tracking tools, allowing patients to manage their healthcare needs efficiently.</p>
                    </div>
                    {{-- <figure class="profile wow fadeInUp" data-wow-delay="1s">
                        <img src="images/author-image.jpg" class="img-responsive" alt="">
                        <figcaption>
                            <h3>Dr. Neil Jackson</h3>
                            <p>General Principal</p>
                        </figcaption>
                    </figure> --}}
                </div>
            </div>

        </div>
    </div>
</section>


<!-- TEAM -->
<section id="team" data-stellar-background-ratio="1">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-sm-6">
                <div class="about-info">
                    <h2 class="wow fadeInUp" data-wow-delay="0.1s">Our Doctors</h2>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="col-md-4 col-sm-6">
                <div class="team-thumb wow fadeInUp" data-wow-delay="0.2s">
                    <img src="images/team-image1.jpg" class="img-responsive" alt="">

                    <div class="team-info">
                        <h3>Khanh Le</h3>
                        <p>Eyes</p>
                        <div class="team-contact-info">
                            <p><i class="fa fa-phone"></i> 010-020-0120</p>
                            <p><i class="fa fa-envelope-o"></i> <a href="#">general@company.com</a></p>
                        </div>
                        <ul class="social-icon">
                            <li><a href="#" class="fa fa-facebook-square"></a></li>
                            <li><a href="#" class="fa fa-envelope-o"></a></li>
                            <li><a href="{{ route('detail-doctor') }}" class="fa fa-flickr"></a></li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="team-thumb wow fadeInUp" data-wow-delay="0.4s">
                    <img src="images/team-image3.jpg" class="img-responsive" alt="">

                    <div class="team-info">
                        <h3>Phan Ngan</h3>
                        <p>Neurosurgery</p>
                        <div class="team-contact-info">
                            <p><i class="fa fa-phone"></i> 010-070-0170</p>
                            <p><i class="fa fa-envelope-o"></i> <a href="#">pregnancy@company.com</a></p>
                        </div>
                        <ul class="social-icon">
                            <li><a href="#" class="fa fa-facebook-square"></a></li>
                            <li><a href="#" class="fa fa-envelope-o"></a></li>
                            <li><a href="{{ route('detail-doctor') }}" class="fa fa-flickr"></a></li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="team-thumb wow fadeInUp" data-wow-delay="0.6s">
                    <img src="images/team-image2.jpg" class="img-responsive" alt="">

                    <div class="team-info">
                        <h3>Hau Nguyen</h3>
                        <p>Heart</p>
                        <div class="team-contact-info">
                            <p><i class="fa fa-phone"></i> 010-040-0140</p>
                            <p><i class="fa fa-envelope-o"></i> <a href="#">cardio@company.com</a></p>
                        </div>
                        <ul class="social-icon">
                            <li><a href="#" class="fa fa-facebook-square"></a></li>
                            <li><a href="#" class="fa fa-envelope-o"></a></li>
                            <li><a href="{{ route('detail-doctor') }}" class="fa fa-flickr"></a></li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>


<!-- NEWS -->
<section id="news" data-stellar-background-ratio="2.5">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-sm-12">
                <!-- SECTION TITLE -->
                <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                    <h2>Latest News</h2>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <!-- NEWS THUMB -->
                <div class="news-thumb wow fadeInUp" data-wow-delay="0.4s">
                    <a href="news-detail.html">
                        <img src="images/news-image1.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="news-info">
                        <span>March 08, 2023</span>
                        <h3><a href="news-detail.html">New Treatment Shows Promise in Managing Chronic Pain</a></h3>
                        <p>A new medication has been approved by the FDA for the management of chronic pain. The
                            medication, which is a non-opioid alternative, has shown promising results in clinical
                            trials and has the potential to provide relief to millions of people who suffer from chronic
                            pain. At our clinic, we are excited to offer this new treatment option to our patients who
                            are struggling with chronic pain and are committed to staying at the forefront of pain
                            management research.</p>
                        <div class="author">
                            <img src="images/author-image.jpg" class="img-responsive" alt="">
                            <div class="author-info">
                                <h5>Jeremie Carlson</h5>
                                <p>CEO / Founder</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <!-- NEWS THUMB -->
                <div class="news-thumb wow fadeInUp" data-wow-delay="0.6s">
                    <a href="news-detail.html">
                        <img src="images/news-image2.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="news-info">
                        <span>February 20, 2023</span>
                        <h3><a href="news-detail.html">COVID-19 Vaccines: What You Need to Know</a></h3>
                        <p>As the COVID-19 pandemic continues to affect communities around the world, it is important to
                            stay informed about the latest developments regarding vaccines. At our clinic, we are
                            closely following the guidance of public health officials and are committed to providing our
                            patients with accurate and up-to-date information about COVID-19 vaccines. We encourage
                            everyone who is eligible to get vaccinated as soon as possible to protect themselves and
                            their communities.</p>
                        <div class="author">
                            <img src="images/author-image.jpg" class="img-responsive" alt="">
                            <div class="author-info">
                                <h5>Jason Stewart</h5>
                                <p>General Director</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <!-- NEWS THUMB -->
                <div class="news-thumb wow fadeInUp" data-wow-delay="0.8s">
                    <a href="news-detail.html">
                        <img src="images/news-image3.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="news-info">
                        <span>January 27, 2023</span>
                        <h3><a href="news-detail.html">New Guidelines for Managing High Blood Pressure</a></h3>
                        <p>The American Heart Association has released new guidelines for the management of high blood
                            pressure. The updated guidelines lower the threshold for a hypertension diagnosis and
                            emphasize the importance of lifestyle modifications, such as exercise and diet, in
                            controlling blood pressure. At our clinic, we are committed to helping our patients manage
                            their blood pressure through a personalized approach that takes into account their unique
                            health needs and goals.</p>
                        <div class="author">
                            <img src="images/author-image.jpg" class="img-responsive" alt="">
                            <div class="author-info">
                                <h5>Andrio Abero</h5>
                                <p>Online Advertising</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@include('layouts.footer')
