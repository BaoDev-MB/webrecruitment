@extends('layouts.main', ["ishome" => 'transparent'])

@section('title', 'Home Page')

@section('content')
<!-- Banner
    ================================================== -->
<div id="banner" class="with-transparent-header parallax background"
    style="background-image: url(images/banner-home-02.jpg)" data-img-width="2000" data-img-height="1330"
    data-diff="300">
    <div class="container">
        <div class="sixteen columns">

            <div class="search-container">

                <!-- Form -->
                <h2>Find Job</h2>
                <input type="text" class="ico-01" placeholder="job title, keywords or company name" value="" />
                <input type="text" class="ico-02" placeholder="city, province or region" value="" />
                <button><i class="fa fa-search"></i></button>

                <!-- Browse Jobs -->
                <div class="browse-jobs">
                    Browse job offers by <a href="browse-categories.html"> category</a> or <a href="#">location</a>
                </div>

                <!-- Announce -->
                <!-- 				<div class="announce">
                        We’ve over <strong>15 000</strong> job offers for you!
                    </div> -->

            </div>

        </div>
    </div>
</div>


<!-- Content
    ================================================== -->

<!-- Recent Jobs -->

<div class="container">
    <div class="row">
        <!-- Recent Jobs -->
        <div class="eleven columns">
            <div class="padding-right">
                <h3 class="margin-bottom-25">Recent Jobs</h3>
                <div class="listings-container">

                    <!-- Listing -->
                    <a href="job-page-alt.html" class="listing full-time">
                        <div class="listing-logo">
                            <img src="images/job-list-logo-01.png" alt="">
                        </div>
                        <div class="listing-title">
                            <h4>Marketing Coordinator - SEO / SEM Experience <span class="listing-type">Full-Time</span>
                            </h4>
                            <ul class="listing-icons">
                                <li><i class="ln ln-icon-Management"></i> King</li>
                                <li><i class="ln ln-icon-Map2"></i> 7th Avenue, New York, NY, United States</li>
                                <li><i class="ln ln-icon-Money-2"></i> $5000 - $7000</li>
                                <li>
                                    <div class="listing-date new">new</div>
                                </li>
                            </ul>
                        </div>
                    </a>

                    <!-- Listing -->
                    <a href="job-page.html" class="listing part-time">
                        <div class="listing-logo">
                            <img src="images/job-list-logo-02.png" alt="">
                        </div>
                        <div class="listing-title">
                            <h4>Core PHP Developer for Site Maintenance <span class="listing-type">Part-Time</span></h4>
                            <ul class="listing-icons">
                                <li><i class="ln ln-icon-Management"></i> Cubico</li>
                                <li><i class="ln ln-icon-Map2"></i> Sydney</li>
                                <li><i class="ln ln-icon-Money-2"></i> $125 / hour</li>
                                <li>
                                    <div class="listing-date">3d ago</div>
                                </li>
                            </ul>
                        </div>
                    </a>

                    <!-- Listing -->
                    <a href="job-page-alt.html" class="listing full-time">
                        <div class="listing-logo">
                            <img src="images/job-list-logo-01.png" alt="">
                        </div>
                        <div class="listing-title">
                            <h4>Restaurant Team Member - Crew <span class="listing-type">Full-Time</span></h4>
                            <ul class="listing-icons">
                                <li><i class="ln ln-icon-Management"></i> King</li>
                                <li><i class="ln ln-icon-Map2"></i> Sydney</li>
                                <li>
                                    <div class="listing-date">3d ago</div>
                                </li>
                            </ul>
                        </div>
                    </a>

                    <!-- Listing -->
                    <a href="job-page.html" class="listing internship">
                        <div class="listing-logo">
                            <img src="images/job-list-logo-04.png" alt="">
                        </div>
                        <div class="listing-title">
                            <h4>Power Systems User Experience Designer <span class="listing-type">Internship</span></h4>
                            <ul class="listing-icons">
                                <li><i class="ln ln-icon-Management"></i> Hexagon</li>
                                <li><i class="ln ln-icon-Map2"></i> London</li>
                                <li><i class="ln ln-icon-Money-2"></i> $55 / hour</li>
                                <li>
                                    <div class="listing-date">4d ago</div>
                                </li>
                            </ul>
                        </div>
                    </a>

                    <!-- Listing -->
                    <a href="job-page.html" class="listing freelance">
                        <div class="listing-logo">
                            <img src="images/job-list-logo-05.png" alt="">
                        </div>
                        <div class="listing-title">
                            <h4>iPhone / Android Music App Development <span class="listing-type">Freelance</span></h4>
                            <ul class="listing-icons">
                                <li><i class="ln ln-icon-Management"></i> Hexagon</li>
                                <li><i class="ln ln-icon-Map2"></i> London</li>
                                <li><i class="ln ln-icon-Money-2"></i> $85 / hour</li>
                                <li>
                                    <div class="listing-date">4d ago</div>
                                </li>
                            </ul>
                        </div>
                    </a>
                </div>

                <a href="browse-jobs.html" class="button centered"><i class="fa fa-plus-circle"></i> Show More Jobs</a>
                <div class="margin-bottom-55"></div>
            </div>
        </div>

        <!-- Job Spotlight -->
        <div class="five columns">
            <h3 class="margin-bottom-5">Job Spotlight</h3>

            <!-- Navigation -->
            <div class="showbiz-navigation">
                <div id="showbiz_left_1" class="sb-navigation-left"><i class="fa fa-angle-left"></i></div>
                <div id="showbiz_right_1" class="sb-navigation-right"><i class="fa fa-angle-right"></i></div>
            </div>
            <div class="clearfix"></div>

            <!-- Showbiz Container -->
            <div id="job-spotlight" class="showbiz-container">
                <div class="showbiz" data-left="#showbiz_left_1" data-right="#showbiz_right_1"
                    data-play="#showbiz_play_1">
                    <div class="overflowholder">

                        <ul>

                            <li>
                                <div class="job-spotlight">
                                    <a href="#">
                                        <h4>Social Media: Advertising Coordinator <span
                                                class="part-time">Part-Time</span>
                                        </h4>
                                    </a>
                                    <span><i class="fa fa-briefcase"></i> Mates</span>
                                    <span><i class="fa fa-map-marker"></i> New York</span>
                                    <span><i class="fa fa-money"></i> $20 / hour</span>
                                    <p>As advertising & content coordinator, you will support our social media team in
                                        producing high quality social content for a range of media channels.</p>
                                    <a href="job-page.html" class="button">Apply For This Job</a>
                                </div>
                            </li>

                            <li>
                                <div class="job-spotlight">
                                    <a href="#">
                                        <h4>Prestashop / WooCommerce Product Listing <span
                                                class="freelance">Freelance</span></h4>
                                    </a>
                                    <span><i class="fa fa-briefcase"></i> King</span>
                                    <span><i class="fa fa-map-marker"></i> London</span>
                                    <span><i class="fa fa-money"></i> $25 / hour</span>
                                    <p>Etiam suscipit tellus ante, sit amet hendrerit magna varius in. Pellentesque
                                        lorem
                                        quis enim venenatis pellentesque.</p>
                                    <a href="job-page.html" class="button">Apply For This Job</a>
                                </div>
                            </li>

                            <li>
                                <div class="job-spotlight">
                                    <a href="#">
                                        <h4>Logo Design <span class="freelance">Freelance</span></h4>
                                    </a>
                                    <span><i class="fa fa-briefcase"></i> Hexagon</span>
                                    <span><i class="fa fa-map-marker"></i> Sydney</span>
                                    <span><i class="fa fa-money"></i> $10 / hour</span>
                                    <p>Proin ligula neque, pretium et ipsum eget, mattis commodo dolor. Etiam tincidunt
                                        libero quis commodo.</p>
                                    <a href="job-page.html" class="button">Apply For This Job</a>
                                </div>
                            </li>


                        </ul>
                        <div class="clearfix"></div>

                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Recent Jobs / End -->




@endsection()