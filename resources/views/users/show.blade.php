@extends('app')

@section('content')

    <!-- WRAPPER -->
    <div id="wrapper">

        <div id="shop">

            <!-- PAGE TITLE -->
            <header id="page-title">
                <div class="container">
                    <h1>About {{ $user->name }}</h1>

                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class="active">{{ Lang::get('strings.breadAboutUser', ['userName' => $user->name]) }}</li>
                    </ul>
                </div>
            </header>


            <section class="container">

                @include('partials._flash')

                @include('users._profile')

                <div class="divider styleColor"><!-- divider -->
                    <i class="fa fa-chevron-down"></i>
                </div>

                <div class="tabs nomargin-top">

                    <!-- tabs -->
                    <ul class="nav nav-tabs">
                        @if ($user->isChef())
                            <li class="active">
                                <a href="#tab1" data-toggle="tab">
                                    <i class="fa fa-cogs"></i> Chef {{ $user->name }}
                                </a>
                            </li>
                            @if ($user->isHungry())
                                <li>
                                    <a href="#tab2" data-toggle="tab">
                                        <i class="fa fa-heart"></i> Hungry {{ $user->name }}
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="active">
                                <a href="#tab1" data-toggle="tab">
                                    <i class="fa fa-heart"></i> Hungry {{ $user->name }}
                                </a>
                            </li>
                        @endif
                    </ul>

                    <!-- tabs content -->
                    <div class="tab-content">
                        @if ($user->isChef())
                            <div id="tab1" class="tab-pane active">
                                @include('users._chef')
                            </div>
                            @if ($user->isHungry())
                                <div id="tab2" class="tab-pane">
                                    @include('users._hungry')
                                </div>
                            @endif
                        @else
                            <div id="tab1" class="tab-pane active">
                                @if ($user->isHungry())
                                    @include('users._hungry')
                                @else
                                    <span>{{ $user->name }} doesn't have any hungry activities yet.</span>
                                @endif
                            </div>
                        @endif
                    </div>

                </div>

            </section>

        </div>
    </div>
    <!-- /WRAPPER -->

    @include('partials._footer')

@endsection

@section('afterScripts')
    <script>
        
    </script>
@endsection