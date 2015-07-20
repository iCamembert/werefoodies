@if ($user->isMe())
    <div class="row">
        <div class="col-md-12">
            <h2>Orders from Hungries</h2>
            <form class="white-row" method="post" action="shop-cc-pay.html">
                <p>
                    Here's the list of orders placed by Hungries for your dishes!
                </p>
                <h5>Orders:</h5>

                <!-- LIST OF ORDERS FROM OTHER USERS -->
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">
                            <table class="table table-hover table-bordered" style="table-layout: fixed">
                                <thead>
                                <tr>
                                    <th class="text-center" style="width: 5%;">#</th>
                                    <th class="text-center" style="width: 10%;">Order ID</th>
                                    <th class="text-center" style="width: 20%;">Dish</th>
                                    <th class="text-center" style="width: 10%;">Client's Name</th>
                                    <th class="text-center" style="width: 10%;">Quantity</th>
                                    <th class="text-center" style="width: 10%;">Total Price</th>
                                    <th class="text-center" style="width: 15%;">Due on</th>
                                    <th class="text-center" style="width: 20%;">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($user->clientOrders as $index => $clientOrder)
                                    <tr>
                                        <th class="text-center" style="vertical-align: middle;" scope="row">{{ $index + 1 }}</th>
                                        <td class="text-center" style="vertical-align: middle;">{{ $clientOrder->id }}</td>
                                        <td class="text-center" style="vertical-align: middle;">{{ $clientOrder->dish_name }}</td>
                                        <td class="text-center" style="vertical-align: middle;">{{ $clientOrder->user->toArray()['name'] }}</td>
                                        <td class="text-center" style="vertical-align: middle;">{{ $clientOrder->quantity }}</td>
                                        <td class="text-center" style="vertical-align: middle;">{{ $clientOrder->quantity * $clientOrder->dish_price }}</td>
                                        <td style="vertical-align: middle;">{{ $clientOrder->served_at }}</td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            @if ($clientOrder->status_id == 0)
                                                <span class="orange">Pending</span>
                                                <a href="{{ action('OrdersController@accept', array('orders' => $clientOrder)) }}"><i class="fa fa-check" title="Accept Order!"></i></a>
                                                <a href="{{ action('OrdersController@reject', array('orders' => $clientOrder)) }}"><i class="fa fa-times" title="Reject Order!"></i></a>
                                            @elseif ($clientOrder->status_id == 1)
                                                <span class="green">Accepted</span>
                                            @elseif ($clientOrder->status_id == 2)
                                                <span class="red">Rejected</span>
                                            @elseif ($clientOrder->status_id ==3)
                                                <span class="blue">Canceled</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /LIST OF ORDERS FROM OTHER USERS -->
            </form>
        </div>
    </div>

    <div class="divider styleColor"><!-- divider -->
        <i class="bg-white fa fa-star"></i>
    </div>
@endif

<div class="row">
    <div class="col-md-12">
        @if ($user->isMe())
            <h2>My Dishes</h2>
        @else
            <h2>{{ $user->name }}'s Dishes</h2>
        @endif
        <form class="white-row" method="post" action="shop-cc-pay.html">
            <p>
                @if ($user->isMe())
                    Here's the list of dishes you created.
                @else
                    Here's the list of dishes {{ $user->name }} created.
                @endif
            </p>
            @if ($user->isMe())
                <p>
                    <strong>How about adding a new one?</strong>
                    <a href="{{ url('dishes/create') }}" class="btn btn-primary">Add a Dish</a>
                </p>
            @else
                @unless ($user->isChef())
                <p>
                    <strong>How about becoming a chef yourself?</strong>
                    <a href="{{ url('dishes/create') }}" class="btn btn-primary">Suggest a Dish</a>
                </p>
                @endunless
            @endif
            <h5>Dishes:</h5>

            <!-- LIST OF DISHES -->
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <table class="table table-hover table-bordered" style="table-layout: fixed">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 5%;">#</th>
                                <th class="text-center" style="width: 15%;">Picture</th>
                                <th class="text-center" style="width: 5%;">Price</th>
                                <th class="text-center" style="width: 10%;">Name</th>
                                <th class="text-center" style="width: 33%;">Description</th>
                                <th class="text-center" style="width: 7%;">Rating</th>
                                <th class="text-center" style="width: 10%;">Created on</th>
                                <th class="text-center" style="width: 20%;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($user->dishes as $index => $dish)
                                <tr>
                                    @if ($user->isMe())
                                        <th class="text-center" style="vertical-align: middle;" scope="row">{{ $index + 1 }}</th>
                                        <td><a href="{{ action('DishesController@show', array('dishes' => $dish, 'isBeingOrdered' => 0)) }}"><img class="img-responsive center-block" src="{{ asset('/userdata/' . $user->id . '/dishes/' . $dish->id . '/picture_sm.jpg') }}" alt="Dish Picture" width="130" height="130" /></a></td>
                                        <td class="text-center" style="vertical-align: middle;">{{ $dish->price }}</td>
                                        <td class="text-center" style="vertical-align: middle;">{{ $dish->name }}</td>
                                        <td><div class="ellipsis" style="height: 100px;">{{ $dish->description }}</div></td>
                                        <td class="text-center" style="vertical-align: middle;">{{ $dish->rating }}%</td>
                                        <td class="text-center" style="vertical-align: middle;">{{ $dish->created_at }}</td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            <a href="{{ action('DishesController@edit', array('dishes' => $dish)) }}" class="btn btn-primary">Edit</a>
                                            <a href="" class="btn btn-primary">Delete</a>
                                        </td>
                                    @else
                                        <th class="text-center" style="vertical-align: middle;" scope="row">{{ $index + 1 }}</th>
                                        <td><a href="{{ action('DishesController@show', array('dishes' => $dish, 'isBeingOrdered' => 0)) }}"><img class="img-responsive center-block" src="{{ asset('/userdata/' . $user->id . '/dishes/' . $dish->id . '/picture_sm.jpg') }}" alt="Dish Picture" width="130" height="130" /></a></td>
                                        <td class="text-center" style="vertical-align: middle;">{{ $dish->price }}</td>
                                        <td class="text-center" style="vertical-align: middle;">{{ $dish->name }}</td>
                                        <td><div class="ellipsis" style="height: 100px;">{{ $dish->description }}</div></td>
                                        <td class="text-center" style="vertical-align: middle;">{{ $dish->rating }}%</td>
                                        <td class="text-center" style="vertical-align: middle;">{{ $dish->created_at }}</td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            <a href="{{ action('DishesController@show', array('dishes' => $dish, 'isBeingOrdered' => 0)) }}" class="btn btn-primary">See</a>
                                            <a href="{{ action('DishesController@show', array('dishes' => $dish, 'isBeingOrdered' => 1)) }}" class="btn btn-primary">Order</a>
                                        </td>
                                    @endif

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /LIST OF DISHES -->
        </form>
    </div>
</div>

<div class="divider styleColor"><!-- divider -->
    <i class="bg-white fa fa-star"></i>
</div>

<div class="row">
    <div class="col-md-12">
        @if ($user->isMe())
            <h2>My Dishes</h2>
        @else
            <h2>{{ $user->name }}'s Dishes</h2>
        @endif
        <form class="white-row" method="post" action="shop-cc-pay.html">
            <p>
                @if ($user->isMe())
                    Here's the list of dishes you created.
                @else
                    Here's the list of dishes {{ $user->name }} created.
                @endif
            </p>
            @if ($user->isMe())
                <p>
                    <strong>How about adding a new one?</strong>
                    <a href="{{ url('dishes/create') }}" class="btn btn-primary">Add a Dish</a>
                </p>
            @else
                @unless ($user->isChef())
                <p>
                    <strong>How about becoming a chef yourself?</strong>
                    <a href="{{ url('dishes/create') }}" class="btn btn-primary">Suggest a Dish</a>
                </p>
                @endunless
            @endif
            <h5>Dishes:</h5>

            <!-- LIST OF DISHES -->
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
            <section id="portfolio">
                <div class="container">

                    <ul class="nav nav-pills isotope-filter isotope-filter" data-sort-id="isotope-list" data-option-key="filter">
                        <li data-option-value="*" class="active"><a href="#">A La Carte</a></li>
                        <li data-option-value=".set1"><a href="#">Set 1</a></li>
                        <li data-option-value=".set2"><a href="#">Set 2</a></li>
                        <li data-option-value=".set3"><a href="#">Set 3</a></li>
                    </ul>


                    <div class="row">

                        <ul class="sort-destination isotope" data-sort-id="isotope-list">

                            @foreach ($user->dishes as $dish)
                                @if ($dish->price < 5)
                                <li class="isotope-item col-sm-6 col-md-3 set1"><!-- item -->
                                    <div class="item-box">
                                        <figure>
                                            <a class="item-hover" href="{{ action('DishesController@show', array('dishes' => $dish, 'isBeingOrdered' => 0)) }}">
                                                <span class="overlay color2"></span>
                                                <span class="inner">
                                                    <span class="block fa fa-plus fsize20"></span>
                                                    <strong>SEE</strong> MORE
                                                </span>
                                            </a>
                                            <img class="img-responsive" src="{{ asset('/userdata/' . $user->id . '/dishes/' . $dish->id . '/picture_md.jpg') }}" width="200" height="200" alt="">
                                        </figure>
                                        <div class="item-box-desc">
                                            <h4>{{ $dish->name }}</h4>
                                            <small class="styleColor">{{ $dish->price }}</small>
                                        </div>
                                    </div>
                                </li>
                                @elseif ($dish->price < 8)
                                    <li class="isotope-item col-sm-6 col-md-3 set2"><!-- item -->
                                    <div class="item-box">
                                        <figure>
                                            <a class="item-hover" href="{{ action('DishesController@show', array('dishes' => $dish, 'isBeingOrdered' => 0)) }}">
                                                <span class="overlay color2"></span>
                                                <span class="inner">
                                                    <span class="block fa fa-plus fsize20"></span>
                                                    <strong>SEE</strong> MORE
                                                </span>
                                            </a>
                                            <img class="img-responsive" src="{{ asset('/userdata/' . $user->id . '/dishes/' . $dish->id . '/picture_md.jpg') }}" width="200" height="200" alt="">
                                        </figure>
                                        <div class="item-box-desc">
                                            <h4>{{ $dish->name }}</h4>
                                            <small class="styleColor">{{ $dish->price }}</small>
                                        </div>
                                    </div>
                                </li>
                                @else
                                    <li class="isotope-item col-sm-6 col-md-3 set3"><!-- item -->
                                    <div class="item-box">
                                        <figure>
                                            <a class="item-hover" href="{{ action('DishesController@show', array('dishes' => $dish, 'isBeingOrdered' => 0)) }}">
                                                <span class="overlay color2"></span>
                                                <span class="inner">
                                                    <span class="block fa fa-plus fsize20"></span>
                                                    <strong>SEE</strong> MORE
                                                </span>
                                            </a>
                                            <img class="img-responsive" src="{{ asset('/userdata/' . $user->id . '/dishes/' . $dish->id . '/picture_md.jpg') }}" width="200" height="200" alt="">
                                        </figure>
                                        <div class="item-box-desc">
                                            <h4>{{ $dish->name }}</h4>
                                            <small class="styleColor">{{ $dish->price }}</small>
                                        </div>
                                    </div>
                                </li>
                                @endif                                
                            @endforeach
                        </ul>

                    </div><!-- /.masonry-container -->

                </div>
            </section>
        </div>
    </div>
</div>
             <!-- /LIST OF DISHES -->
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <h2>Reviews from Hungries</h2>
        <form class="white-row" method="post" action="shop-cc-pay.html">
            <p>
                @if ($user->isMe())
                    Check out how Hungries enjoyed <strong>your</strong> dishes!
                @else
                    Check out how Hungries enjoyed <strong>{{ $user->name }}'s</strong> dishes!
                @endif
            </p>

            <h5>Reviews:</h5>

            <!-- LIST OF REVIEWS FROM OTHER USERS-->
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 5%;">#</th>
                                <th class="text-center" style="width: 10%;">Author</th>
                                <th class="text-center" style="width: 15%;">Title</th>
                                <th class="text-center" style="width: 30%;">Body</th>
                                <th class="text-center" style="width: 10%;">Chef Rating</th>
                                <th class="text-center" style="width: 15%;">Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($user->clientReviews as $index => $clientReview)
                                <tr>
                                    <th class="text-center" style="vertical-align: middle;" scope="row">{{ $index + 1 }}</th>
                                    <td class="text-center" style="vertical-align: middle;">{{ $clientReview->user->toArray()['name'] }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $clientReview->title }}</td>
                                    <td><div class="ellipsis" style="height: 100px;">{{ $clientReview->body }}</div></td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $clientReview->chef_rating }}%</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $clientReview->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /LIST OF REVIEWS FROM OTHER USERS -->
        </form>
    </div>
</div>

<div class="divider styleColor"><!-- divider -->
    <i class="bg-white fa fa-star"></i>
</div>