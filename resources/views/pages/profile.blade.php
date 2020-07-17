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
                <div class="col-lg-6 col-md-12">
                    <div class="dashboard-list-box margin-top-0">
                        <h4 class="gray">Profile Details</h4>
                        <div class="dashboard-list-box-static">

                            <!-- Avatar -->
                            <div class="edit-profile-photo">
                                <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=300"
                                     alt="">
                                <div class="change-photo-btn">
                                    <div class="photoUpload">
                                        <span><i class="fa fa-upload"></i> Upload Photo</span>
                                        <input type="file" class="upload"/>
                                    </div>
                                </div>
                            </div>
                            <form class="form-horizontal" action="{{route('profile.update',$users->id)}}" role="form" method="post">
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
                            <!-- Details -->
                            <div class="my-profile">

                                <label>Your Name</label>
                                <input type="text" name="name" value='{{$users-> first_name}}'>

                                <label>Phone</label>
                                <input value='{{$users-> phone}}' type="text" name="phone">

                                <label>Email</label>
                                <input value='{{$users-> email}}' type="text" name="email" readonly>

                                <label>Notes</label>
                                <textarea name="notes" id="notes" cols="30"
                                          rows="10">Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper</textarea>

                                <label><i class="fa fa-twitter"></i> Twitter</label>
                                <input placeholder="https://www.twitter.com/" type="text">

                                <label><i class="fa fa-facebook-square"></i> Facebook</label>
                                <input placeholder="https://www.facebook.com/" type="text">

                                <label><i class="fa fa-google-plus"></i> Google+</label>
                                <input placeholder="https://www.google.com/" type="text">

                            </div>

                            <button class="button margin-top-15" type="submit">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>


                <!-- Change Password -->
                <div class="col-lg-6 col-md-12">
                    <div class="dashboard-list-box margin-top-0">
                        <h4 class="gray">Change Password</h4>
                        <div class="dashboard-list-box-static">
                            <form class="form-horizontal" action="{{route('profile.store',$users->id)}}" role="form" method="post">
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
                                <input type="password" name="pass" >

                                <label>New Password</label>
                                <input type="password" name="pass_new"   >

                                <label>Confirm New Password</label>
                                <input type="password" name="pass_confirm"  >

                                <button class="button margin-top-15" type="submit">Change Password</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

    </div>
    <!-- Content / End -->

@endsection