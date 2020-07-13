@extends('layouts.main', ['isDashboard' => 'y'])

@section('title', 'Add Job')

@section('dashboard-content')
    <!-- Content
	================================================== -->
    <div class="dashboard-content">


        <!-- Titlebar -->
        <div id="titlebar">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Job</h2>
                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Dashboard</a></li>
                            <li>Add Job</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <form action="{{route('jobs.store')}}" method="post">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif
            @csrf
            <div class="row">
                <!-- Table-->
                <div class="col-lg-12 col-md-12">

                    <div class="dashboard-list-box margin-top-0">
                        <h4>Job Details</h4>
                        <div class="dashboard-list-box-content">
                            <div class="submit-page">

                                <!-- Email -->
                                <div class="form">
                                    <h5>Your Email</h5>
                                    <input class="search-field" name="email" type="text" placeholder="mail@example.com"
                                           value="{{old('email')}}"/>
                                </div>

                                <!-- Title -->
                                <div class="form">
                                    <h5>Job Title</h5>
                                    <input class="search-field" name="job_title" type="text" placeholder="" value="{{old('job_title')}}"/>
                                </div>

                                <!-- Job Type -->
                                <div class="form">
                                    <h5>Job Type</h5>
                                    <select data-placeholder="Full-Time" name="job_type"
                                            class="chosen-select-no-single" multiple>
                                        @foreach($job_types->all() as $job_type)
                                            <option value="{{$job_type->id}}">{{$job_type->name}}</option>
                                        @endforeach

                                    </select>
                                </div>


                                <!-- Choose Category -->
                                <div class="form">
                                    <div class="select">
                                        <h5>Category</h5>
                                        <select data-placeholder="Choose Categories" name="majors" class="chosen-select">
                                            @foreach($majors as $major)
                                                <option value="{{$major->id}}">{{$major->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <!-- Location -->
                                <div class="form">
                                    <h5>Location <span>(optional)</span></h5>
                                    <input class="search-field" name="location" type="text" placeholder="e.g. London"
                                           value="{{old('location')}}"/>
                                    <p class="note">Leave this blank if the location is not important</p>
                                </div>


                                <!-- Tags -->
                                <div class="form">
                                    <h5>Job Tags <span>(optional)</span></h5>
                                    <input class="search-field" name="job_tag" type="text"
                                           placeholder="e.g. PHP, Social Media, Management"
                                           value="{{old('job_tag')}}"/>
                                    <p class="note">Comma separate tags, such as required skills or technologies, for
                                        this job.
                                    </p>
                                </div>


                                <!-- Description -->
                                <div class="form" style="width: 100%;">
                                    <h5>Description</h5>
                                    <textarea class="WYSIWYG" name="description" cols="40" rows="3" id="description"
                                              spellcheck="true">{{old('description')}}</textarea>
                                </div>
                                <!-- Description -->
                                <div class="form" style="width: 100%;">
                                    <h5>Requirements</h5>
                                    <textarea class="WYSIWYG" name="requirements" cols="40" rows="3" id="requirements"
                                              spellcheck="true">{{old('requirements')}}</textarea>
                                </div>
                                <!-- Description -->
                                <div class="form" style="width: 100%;">
                                    <h5>Benefits</h5>
                                    <textarea class="WYSIWYG" name="benefits" cols="40" rows="3" id="benefits"
                                              spellcheck="true">{{old('benefits')}}</textarea>
                                </div>
                                <!-- Application email/url -->
                                <div class="form">
                                    <h5>Application email / URL</h5>
                                    <input type="text" name="job_url" value="{{old('job_url')}}"
                                           placeholder="Enter an email address or website URL">
                                </div>

                                <!-- TClosing Date -->
                                <div class="form">
                                    <h5>Closing Date <span>(optional)</span></h5>
                                    <input data-role="date" name="date_expire" value="{{old('date_expire')}}" type="text" placeholder="yyyy-mm-dd">
                                    <p class="note">Deadline for new applicants.</p>
                                </div>

                            </div>

                        </div>
                    </div>


{{--                                <a type="submit" class="button margin-top-30">Preview <i class="fa fa-arrow-circle-right"></i></a>--}}
                    <button type="submit">Preview <i class="fa fa-arrow-circle-right"></i></button>
                </div>


                <!-- Copyrights -->
                <div class="col-md-12">
                    <div class="copyrights">© 2019 WorkScout. All Rights Reserved.</div>
                </div>
            </div>
        </form>
    </div>
    <!-- Content / End -->


@endsection()
