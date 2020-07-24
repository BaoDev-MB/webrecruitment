@extends('layouts.main', ['isDashboard' => 'y'])

@section('title', 'Profile')

@section('dashboard-content')
    <!-- Content
	================================================== -->
    <div class="dashboard-content">
        <!-- Titlebar -->
        <div id="titlebar">
            <div class="row">
                <div class="col-md-12">
                    <h2>My Profile</h2>
                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Dashboard</a></li>
                            <li>My Profile</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Profile -->
            <div class="col-lg-8 col-md-12">
                <div class="dashboard-list-box margin-top-0">
                    <h4 class="gray">Company Details</h4>
                    <div class="dashboard-list-box-static">
                        <!-- Avatar -->
                        <div class="edit-profile-photo">
                            <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=300"
                                 alt=""/>
                            <div class="change-photo-btn">
                                <div class="photoUpload">
                                    <span><i class="fa fa-upload"></i> Upload Logo</span>
                                    <input type="file" class="upload"/>
                                </div>
                            </div>
                        </div>

                        <!-- Details -->
                        <form class="form-horizontal" action="{{route('profileCompany.update', $company->id)}}"
                              role="form" method="post">
                            <div class="my-profile">

                                @method('PUT')
                                @csrf
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
                                <label>Cover image</label>
                                <label class="upload-btn mt-0">
                                    <input type="file" multiple=""/>
                                    <i class="fa fa-upload"></i> Browse
                                </label>
                                <span class="fake-input">No file selected</span>

                                <label>Company Name</label>
                                <input type="text" value="{{$company->name}}"
                                       name="name" placeholder="Enter the name of the company"/>
                                <label>Location (optional)</label>
                                <input type="text" value="{{$company->location}}"
                                       name="location" placeholder="Enter the location of your company"/>
                                <label>Website (optional)</label>
                                <input type="text" value="{{$company->url}}" name="url" placeholder="http://"/>

                                <label>Description (optional)</label>
                                <textarea name="notes" id="notes" cols="30"
                                          rows="10">{{$company->description}}</textarea>
                            </div>
                            <button class="button margin-top-15" type="submit">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Change Password -->
            <div class="col-lg-4 col-md-12">
                <div class="dashboard-list-box margin-top-0">
                    <h4 class="gray">Change Password</h4>
                    <div class="dashboard-list-box-static">
                        <form class="form-horizontal" action="{{route('profileCompany.store',$company->user_id)}}" role="form"
                              method="post">
                            @method('POST')
                            @csrf
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
                        <!-- Change Password -->
                            <div class="my-profile">
                                <label class="margin-top-0">Current Password</label>
                                <input type="password"/>

                                <label>New Password</label>
                                <input type="password" name="pass_new"/>

                                <label>Confirm New Password</label>
                                <input type="password" name="pass_confirm"/>

                                <button type="submit" class="button margin-top-15">
                                    Change Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content / End -->

@endsection
