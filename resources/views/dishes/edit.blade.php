@extends('app')

@section('content')


    <!-- WRAPPER -->
    <div id="wrapper">

        <div id="shop">

            <!-- PAGE TITLE -->
            <header id="page-title">
                <div class="container">
                    <h1>Edit your Dish</h1>

                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class="active">Edit your Dish</li>
                    </ul>
                </div>
            </header>


            <section class="container white-row">

                <div class="row">

                    <!-- EDIT DISH -->
                    <div class="col-md-6">

                        <h2>Edit your Dish:</h2>

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <!--<ul>
                                    //@foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    //@endforeach
                                        </ul>-->
                            </div>
                        @endif

                        {!! Form::model($dish, ['method' => 'PATCH', 'action' => ['DishesController@update', $dish->id], 'files' => true]) !!}
                        @include('dishes._form', ['submitButtonText' => 'Update Dish'])
                        {!! Form::close() !!}

                        @include('errors.list')

                    </div>
                    <!-- /EDIT DISH -->

                </div>

                <div id="prout" class="row" style="padding-top: 15px;">
                    <div class="col-md-6">
                        <img id="pictureViewer" class="img-responsive" src="{{ asset('userdata/' . Auth::user()->id . '/dishes/' . $dish->id . '/picture.jpg') }}" alt="" width="500px" height="500px"/>
                    </div>
                </div>

            </section>

        </div>
    </div>
    <!-- /WRAPPER -->

    @include('partials._footer')

@endsection