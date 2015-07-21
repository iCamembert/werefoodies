@extends('app')

@section('content')

    <!-- WRAPPER -->
    <div id="wrapper">

        <div id="shop">

            <!-- PAGE TITLE -->
            <header id="page-title">
                <div class="container">
                    <h1>{{ $dish->name  }}</h1>

                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        @if ($dish->isMyDish())
                            <li><a href="{{ action('UsersController@edit') }}">My Account</a></li>
                        @else
                            <li><a href="{{ action('UsersController@show', array('users' => $dish->user)) }}">About {{ $dish->user->name }}</a></li>
                        @endif
                        <li class="active">{{ $dish->name }}</li>
                    </ul>
                </div>
            </header>


            <section class="container">

                @include('partials._flash')

                <h2>About this dish</h2>
                <form class="white-row" method="post" action="#">

                    <div class="row">
                        <div class="col-md-3">
                            <img class="img-responsive" src="{{ asset('userdata/' . $dish->user_id . '/dishes/' . $dish->id . '/picture_md.jpg') }}" alt="Dish Picture" width="300" height="300" />
                            <h3 class="text-center">{{ $dish->name }}</h3>
                        </div>
                        <div class="col-md-9">
                            <ul>
                                <li>Rating: {{ $dish->rating }}%</li>
                                <li>Price for 1 Portion: {{ $dish->price }}</li>
                                <li>Portion Size: Persons</li>
                                <li>Chef: {{ $dish->user->name }}</li>
                                <li>Available Since: {{ $dish->created_at }}</li>
                                <li>Preparation Time: </li>
                                <li>Description: {{ $dish->description }}</li>
                                <li>Tags:
                                    @unless ($dish->tags->isEmpty())
                                        <h5>Tags:</h5>
                                        <ul>
                                            @foreach ($dish->tags as $tag)
                                                <li>{{ $tag->name }}</li>
                                            @endforeach
                                        </ul>
                                    @endunless
                                </li>
                            </ul>
                            @if ($dish->isMyDish())
                                <a href="{{ action('DishesController@edit', array('dishes' => $dish)) }}" class="btn btn-primary">Edit</a>
                            @else
                                <div id="dishQuantityBlock" class="row">
                                    <div class="form-group center-block" style="display: flex; align-items: center;">
                                        {!! Form::open(['method' => 'GET', 'action' => array('DishesController@addToCart', $dish)]) !!}
                                            {!! csrf_field() !!}
                                            <div class="col-md-3">
                                                {!! Form::label('quantity', 'Quantity:') !!}
                                                {!! Form::number('quantity', null, ['id' => 'quantity', 'class' => 'form-control', 'min' => 1, 'onchange' => 'updateTotalPrice(this.value);']) !!}
                                            </div>
                                            <div class="col-md-6">
                                                <span>Total Price: <strong id="totalPrice"></strong></span>
                                            </div>
                                            <div class="col-md-6">
                                                {!! Form::submit('Add', ['class' => 'btn btn-primary form control']) !!}
                                            </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                <a id="addToCartButton" class="btn btn-primary">Add to Cart</a>
                            @endif
                        </div>
                    </div>
                </form>

                <div class="divider styleColor"><!-- divider -->
                    <i class="fa fa-chevron-down"></i>
                </div>

                <div class="row white-row">
                    <div class="col-md-12">
                        <h2>Reviews from other Hungries</h2>
                        <p>
                            @if ($dish->isMyDish())
                                Check out how other Hungries enjoyed <strong>your</strong> <strong>{{ $dish->name }}</strong>!
                            @else
                                Check out how other Hungries enjoyed <strong>{{ $dish->user->name }}</strong>'s <strong>{{ $dish->name }}</strong>!
                            @endif
                        </p>

                        @if ($dish->wasOrderedByUser())
                            @include('reviews.create')
                        @endif

                        
                    </div>
                </div>
            </section>

        </div>
    </div>
    <!-- /WRAPPER -->

    @include('partials._footer')

    @if ($isBeingOrdered == 1 || $isBeingOrdered == 0)
        @include('orders.create')
    @elseif ($isBeingOrdered == 2)
        @include('orders.edit')
    @endif

@endsection

@section('afterScripts')
    <script>

        $('#dishQuantityBlock').hide();
        $('#addToCartButton').click(function() {
            $(this).hide();
            $('#dishQuantityBlock').show(400);
        });

        var price = {{ $dish->price }};
        $('#totalPrice').html($('#quantity').val() * price);

        $(function () {
            $('#datetimepicker').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:00'
                //daysOfWeekDisabled: [0, 6]
            });
        });

        function updateTotalPrice(quantity) {
            $('#totalPrice').html(quantity * price);
        }

        @if ($isBeingOrdered == 1 || $isBeingOrdered == 2)
            $(document).ready(function() {
                $('.bs-example-modal-lg').modal();
            });
        @endif
    </script>
@endsection