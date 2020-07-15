@extends('layouts.main')

@section('title','Job Details')

@section('content')


<!-- Titlebar\
================================================== -->
<div id="titlebar" class="photo-bg" style="background: url({{asset('images/job-page-photo.jpg')}})">
    <div class="container">
        <div class="col-md-8">
            <span><a href="browse-jobs.html">Restaurant / Food Service</a></span>
            <h2>
                {{$job->job_title}}
                <span class="full-time">{{$job->jobtypes[0]->name}}</span>
            </h2>
        </div>

        <div class="col-md-4">
            <a href="#" class="button white"><i class="fa fa-star"></i> Bookmark This Job</a>
        </div>
    </div>
</div>

<!-- Content
================================================== -->
<div class="container">
    <!-- Recent Jobs -->
    <div class="col-md-8">
        <div class="padding-right">
            <!-- Company Info -->
            <div class="company-info">
            <img src="{{$job->company->image}}" alt="" />
                <div class="content">
                    <h4>{{$job->company->name}}</h4>
                    <span><a href="{{$job->url}}"><i class="fa fa-link"></i> {{$job->url}}</a></span>
                    <span><a href="#"><i class="ln ln-icon-Email"></i> {{$job->email}}</a></span>
                </div>
                <div class="clearfix"></div>
            </div>
            <h4 class="margin-bottom-10">
                <strong>Description</strong>
                </h4>
            <p class="margin-reset">

                {{$job->description}}
            </p>

            <br />
            <p>
                The <strong>Service Specialist</strong> will have
                responsibilities that include:
            </p>

            <ul class="list-1">
                <h4 class="margin-bottom-10">
                    <strong>Requirements</strong>
                    </h4>
                {{$job->requirements}}
{{--                <li>--}}
{{--                    Executing the Food Service program, including preparing and--}}
{{--                    presenting our wonderful food offerings to hungry customers on--}}
{{--                    the go!--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    Greeting customers in a friendly manner and suggestive selling--}}
{{--                    and sampling items to help increase sales.--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    Keeping our Store food area looking terrific and ready for our--}}
{{--                    valued customers by managing product inventory, stocking,--}}
{{--                    cleaning, etc.--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    We’re looking for associates who enjoy interacting with people--}}
{{--                    and working in a fast-paced environment!--}}
{{--                </li>--}}
            </ul>

            <br />

            <h4 class="margin-bottom-10">
                 <strong>Benefits</strong>      </h4>

            <ul class="list-1">
                {{$job->benefits}}
{{--                <li>--}}
{{--                    Excellent customer service skills, communication skills, and a--}}
{{--                    happy, smiling attitude are essential.--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    Must be available to work required shifts including weekends,--}}
{{--                    evenings and holidays.--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    Must be able to perform repeated bending, standing and reaching.--}}
{{--                </li>--}}
{{--                <li>Must be able to occasionally lift up to 50 pounds</li>--}}
            </ul>
        </div>
    </div>

    <!-- Widgets -->
    <div class="col-md-4">
        <!-- Sort by -->
        <div class="widget">
            <h4>Overview</h4>

            <div class="job-overview">
                <ul>
                    <li>
                        <i class="fa fa-map-marker"></i>
                        <div>
                            <strong>Location:</strong>
                            <span>{{$job->location}}</span>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-user"></i>
                        <div>
                            <strong>Job Title:</strong>
                            <span>{{$job->job_title}}</span>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-clock-o"></i>
                        <div>
                            <strong>Hours:</strong>
                            <span>40h / week</span>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-money"></i>
                        <div>
                            <strong>Rate:</strong>
                            <span>{{$job->salary}}</span>
                        </div>
                    </li>
                </ul>

                <a href="#myModal" class="btn btn-primary trigger-btn" data-toggle="modal">Apply For This Job</a>
{{--                <a href="--}}{{--#small-dialog--}}{{--{{route('apply',['id'=>$job->id])}}" class="--}}{{--popup-with-zoom-anim--}}{{-- button">Apply For This Job</a>--}}

                <div id="small-dialog" class="zoom-anim-dialog mfp-hide apply-popup">
                    <div class="small-dialog-headline">
                        <h2>Apply For This Job</h2>
                    </div>

                    <div class="small-dialog-content">
                        <form action="#" method="get">
                            <input type="text" placeholder="Full Name" value="" />
                            <input type="text" placeholder="Email Address" value="" />
                            <textarea placeholder="Your message / cover letter sent to the employer"></textarea>

                            <!-- Upload CV -->
                            <div class="upload-info">
                                <strong>Upload your CV (optional)</strong>
                                <span>Max. file size: 5MB</span>
                            </div>
                            <div class="clearfix"></div>

                            <label class="upload-btn">
                                <input type="file" multiple />
                                <i class="fa fa-upload"></i> Browse
                            </label>
                            <span class="fake-input">No file selected</span>

                            <div class="divider"></div>

                            <button class="send">Send Application</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Widgets / End -->
</div>
{{--modal apply success job--}}
<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
{{--                    <i class="material-icons">&#xE876;</i>--}}
                    <i class="fa fa-check material-icons text-white" aria-hidden="true"></i>
                </div>
                <h4 class="modal-title w-100">Awesome!</h4>
            </div>
            <div class="modal-body">
                <p class="text-center">Your booking has been confirmed. Check your email for detials.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
@endsection()
