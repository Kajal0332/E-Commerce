@extends('layouts.app')

@section('content')
    <!-- Breadcrumb -->
<div class="container mt-4">
    <p class="breadcrumb my-5"><a href="/home">Home</a> / My Account</p>
</div>

<!-- Account Section -->
<div class="container">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="sidebar">
                <h5>Manage My Account</h5>
                <a href="/profile" class="active">My Profile</a>
                <hr>
                <h5>My Orders</h5>
                <a href="#">My Returns</a>
                <br>
                <a href="#">My Cancellations</a>
                
            </div>
        </div>

        <!-- Profile Edit Form -->
        <div class="col-md-9">
            <div class="profile-card">
                <h4>Edit Your Profile</h4>
                <div class="row">
                    <div class="col-md-6">
                        <label>First Name</label>
                        <input type="text" class="form-control" value="Md">
                    </div>
                    <div class="col-md-6">
                        <label>Last Name</label>
                        <input type="text" class="form-control" value="Rimel">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label>Email</label>
                        <input type="email" class="form-control" value="rimel111@gmail.com">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label>Address</label>
                        <input type="text" class="form-control" value="Kingston, 5236, United States">
                    </div>
                    <div class="mt-4">
                    <button class="btn btn-outline-secondary">Cancel</button>
                    <button class=" btn btn-dark">Save Changes</button>
                </div>
                </div>

                <h5 class="mt-4">Password Changes</h5>
                <input type="password" class="form-control mt-2" placeholder="Current Password">
                <input type="password" class="form-control mt-2" placeholder="New Password">
                <input type="password" class="form-control mt-2" placeholder="Confirm New Password">

                <div class="mt-4">
                    <button class="btn btn-outline-secondary">Cancel</button>
                    <button class=" btn btn-dark">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection