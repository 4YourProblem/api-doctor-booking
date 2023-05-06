@extends('layouts.layout')
@include('layouts.menu')

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
