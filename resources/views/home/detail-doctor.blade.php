@extends('layouts.layout')
@include('layouts.menu')
<!-- NEWS DETAIL -->
<section id="news-detail" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-sm-7">
                <!-- NEWS THUMB -->
                <div class="news-detail-thumb">
                    <div class="news-image">
                        <img src="images/news-image3.jpg" class="img-responsive" alt="">
                    </div>
                    <h3>Review Annual Medical Research</h3>
                    <p>The Review Annual Medical Research is a comprehensive publication that provides a detailed
                        analysis of the latest advances in medical research from around the world. The publication is
                        authored by a team of highly respected medical professionals who specialize in various areas of
                        medicine, including cardiology, oncology, neurology, and many others. </p>
                    <blockquote>The Review Annual Medical Research is an indispensable resource for healthcare
                        professionals, researchers, and students who want to stay up-to-date on the latest developments
                        in their respective fields. Each edition of the publication is rigorously reviewed and edited to
                        ensure that the information provided is accurate and reliable. The Review Annual Medical
                        Research is published annually and is available both in print and online.</blockquote>


                    <div class="news-social-share">
                        <h4>Share this article</h4>
                        <a href="#" class="btn btn-primary"><i class="fa fa-facebook"></i>Facebook</a>
                        <a href="#" class="btn btn-success"><i class="fa fa-twitter"></i>Twitter</a>
                        <a href="#" class="btn btn-danger"><i class="fa fa-google-plus"></i>Google+</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-5">
                <div class="news-sidebar">
                    <div class="news-author">
                        <h4>About the author</h4>
                        <p>Dr. John Smith is a board-certified physician with over 15 years of experience in the medical
                            field. He received his medical degree from the University of California, San Francisco, and
                            completed his residency at Stanford University Medical Center. Dr. Smith specializes in
                            internal medicine and is committed to providing personalized care to each of his patients.
                            He is known for his compassionate bedside manner and his ability to explain complex medical
                            issues in a way that is easy for patients to understand. In his free time, Dr. Smith enjoys
                            hiking and spending time with his family.</p>
                    </div>

                    <div class="recent-post">
                        <div class="news-categories">
                            <h4>Categories</h4>
                            <a href="#">Dental</a>

                        </div>

                        <div class="news-ads sidebar-ads">
                            <h4>Sidebar Banner Ad</h4>
                        </div>

                        <div class="news-tags">
                            <h4>Tags</h4>
                            <li><a href="#">Pregnancy</a></li>
                            <li><a href="#">Health</a></li>
                            <li><a href="#">Consultant</a></li>
                            <li><a href="#">Medical</a></li>
                            <li><a href="#">Doctors</a></li>
                            <li><a href="#">Social</a></li>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</section>

@include('layouts.footer')
