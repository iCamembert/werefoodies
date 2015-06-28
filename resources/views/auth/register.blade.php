@extends('app')

@section('content')

    <!-- WRAPPER -->
    <div id="wrapper">

        <div id="shop">

            <!-- PAGE TITLE -->
            <header id="page-title">
                <div class="container">
                    <h1>Sign UP</h1>

                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Sign Up</li>
                    </ul>
                </div>
            </header>


            <section class="container">

                <div class="row">

                    <!-- REGISTER -->
                    <div class="col-md-6">

                        <h2>Create <strong>Account</strong></h2>

                        <form class="white-row" role="form" method="POST" action="{{ url('/auth/register') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            @if (count($errors) > 0)
                                <!-- alert failed -->
                                <div class="alert alert-danger">
                                    <i class="fa fa-frown-o"></i>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li><strong>{{ $error }}</strong></li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>E-mail Address</label>
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" name="password_confirmation">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" value="Sign Up" class="btn btn-primary pull-right push-bottom" data-loading-text="Loading...">
                                </div>
                            </div>

                        </form>

                    </div>
                    <!-- /REGISTER -->

                    <!-- WHY? -->
                    <div class="col-md-6">

                        <h2>Why to register?</h2>

                        <div class="white-row">

                            <h4>Registration is fast, easy, and free.</h4>

                            <p>Once you're registered, you can:</p>
                            <ul class="list-icon check">
                                <li>Buy, sell, and interact with other members.</li>
                                <li>Save your favorite searches and get notified.</li>
                                <li>Watch the status of up to 200 items.</li>
                                <li>View your Atropos information from any computer in the world.</li>
                                <li>Connect with the Atropos community.</li>
                            </ul>

                            <hr class="half-margins" />

                            <p>
                                Already have an account?
                                <a href="page-signin.html">Click to Sign In</a>
                            </p>
                        </div>

                        <div class="white-row">
                            <h4>Contact Customer Support</h4>
                            <p>
                                If you're looking for more help or have a question to ask, please <a href="contact-us.html">contact us</a>.
                            </p>
                        </div>

                    </div>
                    <!-- /WHY? -->

                </div>

            </section>

        </div>
    </div>
    <!-- /WRAPPER -->

    @include('partials._footer')

@endsection
