@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
        </div>

        <div class="section-body">
                <div class="container-xl px-4 mt-4">
                    <hr class="mt-0 mb-4" />
                    <div class="row">
                        <div class="col-xl-4">
                            <!-- Profile picture card-->
                            <div class="card mb-4 mb-xl-0">
                                <div class="card-header bg-whitesmoke"><h4>Foto Profil</h4></div>
                                <div class="card-body text-center">
                                    <!-- Profile picture image-->
                                    <img class="img-account-profile rounded-circle mb-2" src="https://sb-admin-pro.startbootstrap.com/assets/img/illustrations/profiles/profile-1.png" alt="" style="width: 12rem"/>
                                    <!-- Profile picture help block-->
                                    <div class="small font-italic text-muted mb-4">JPG / PNG < 5 MB</div>
                                    <!-- Profile picture upload button-->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card-header bg-whitesmoke"><h4>Detail Akun</h4></div>
                                <div class="card-body">
                                    <form class="row g-3">
                                        <!-- Form Group (username)-->
                                        <div class="mb-3 col-md-6">
                                            <label class="small mb-1" for="inputUsername">Username</label>
                                            <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="username" />
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="small mb-1" for="inputOrgName">Organisasi</label>
                                            <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your organization name" value="Admin JTI" disabled readonly/>
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label for="inputPassword5" class="small mb-1">Password</label>
                                            <input type="password" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock">
                                            <div id="passwordHelpBlock" class="form-text">
                                                Password harus 8-20 karakter.
                                            </div>
                                        </div>
                                        <!-- Form Group (email address)-->
                                        <!-- Form Row-->
                                            <!-- Form Group (phone number)-->
                                            <div class="mb-3 col-md-6">
                                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                                <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="name@example.com" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="small mb-1" for="inputPhone">Nomor HP</label>
                                                <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="123456789" />
                                            </div>
                                        <!-- Save changes button-->
                                        <button class="col-md-12 btn btn-primary" type="submit">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>
@endsection

@section('sidebar')
    @parent
    <li class="menu-header">Dashboard</li>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i
                class="fas fa-fire"></i><span>Dashboard</span></a>
        <ul class="dropdown-menu">
            <li>
                <a class="nav-link" href="index-0.html">General Dashboard</a>
            </li>
            <li>
                <a class="nav-link" href="index.html">Ecommerce Dashboard</a>
            </li>
        </ul>
    </li>
@endsection
