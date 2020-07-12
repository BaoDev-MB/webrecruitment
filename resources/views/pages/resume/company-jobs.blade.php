@extends('layouts.main')

@section('title', 'Browse Jobs')

@section('content')

    <!-- Titlebar
================================================== -->
    <div id="titlebar">
        <div class="container">
            <div class="ten columns">
                <span>We found 1,412 jobs matching:</span>
                <h2>Web, Software & IT</h2>
            </div>

            <div class="six columns">
                <a href="{{route('jobs.create')}}" class="button">Post a Job, It’s Free!</a>
            </div>
        </div>
    </div>

<!-- Content
	================================================== -->
<div class="container">

    <div class="row">

        <div class="col-md-6">
            <!-- Select -->
            <select data-placeholder="Filter by status" class="chosen-select-no-single">
                <option value="">Filter by status</option>
                <option value="new">New</option>
                <option value="interviewed">Interviewed</option>
                <option value="offer">Offer extended</option>
                <option value="hired">Hired</option>
                <option value="archived">Archived</option>
            </select>
            <div class="margin-bottom-15"></div>
        </div>

        <div class="col-md-6">
            <!-- Select -->
            <select data-placeholder="Newest first" class="chosen-select-no-single">
                <option value="">Newest first</option>
                <option value="name">Sort by name</option>
                <option value="rating">Sort by rating</option>
            </select>
            <div class="margin-bottom-35"></div>
        </div>


        <!-- Applications -->
        <div class="col-md-12">

            <!-- Application #1 -->
            @foreach($jobs as $job)
            <div class="application">
                <div class="app-content">

                    <!-- Name / Avatar -->
                    <div class="info">
                        <span><a href="{{route('resumes.index', ['id'=>$job->id])}}">{{$job->job_title}}</a></span>
                        <ul>
                            <li><a href="#"><i class="fa fa-envelope"></i> {{$job->email}}</a></li>
                            <li><a href="#"><i class="fa fa-link"></i> {{$job->email}}</a></li>
                        </ul>
                    </div>

                    <!-- Buttons -->
                    <div class="buttons">
                        <a href="{{route('jobs.edit',$job->id)}}" class="button "><i class="fa fa-pencil"></i> Edit</a>
{{--                        <a href="#two-1" class="button gray app-link"><i class="fa fa-sticky-note"></i> Add Note</a>--}}
                        <a href="{{route('jobs.show',$job->id)}}" class="button{{-- gray app-link--}}"><i class="fa fa-plus-circle"></i> Show Details</a>
                    </div>
                    <div class="clearfix"></div>

                </div>

                <!-- Footer -->
                <div class="app-footer">

                    <ul class="rating">
                        <li><i class="fa fa-dollar"></i>{{$job->salary}}</li>
                    </ul>
                    <ul>
                        <li><i class="fa fa-file-text-o"></i> New</li>
                        <li><i class="fa fa-calendar"></i> September 24, 2019</li>
                    </ul>
                    <div class="clearfix"></div>

                </div>
            </div>
        @endforeach

        </div>


        <!-- Copyrights -->
        <div class="col-md-12">
            <div class="copyrights">© 2019 WorkScout. All Rights Reserved.</div>
        </div>
    </div>

</div>
<!-- Content / End -->

@endsection()
