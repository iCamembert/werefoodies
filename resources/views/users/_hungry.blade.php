@if ($user->isMe())
    <div class="row">
        <div class="col-md-12">
            <h2>My Orders</h2>
            <form class="white-row" method="post" action="shop-cc-pay.html">
                <p>
                    Here's the list of orders you placed!
                </p>
                <h5>Orders:</h5>

                <!-- LIST OF ORDERS FROM USER -->
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">
                            <table class="table table-hover table-bordered" style="table-layout: fixed">
                                <thead>
                                <tr>
                                    <th class="text-center" style="width: 5%;">#</th>
                                    <th class="text-center" style="width: 25%;">Dish</th>
                                    <th class="text-center" style="width: 15%;">Chef's Name</th>
                                    <th class="text-center" style="width: 10%;">Quantity</th>
                                    <th class="text-center" style="width: 10%;">Total Price</th>
                                    <th class="text-center" style="width: 15%;">Asked For</th>
                                    <th class="text-center" style="width: 20%;">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($user->orders as $index => $order)
                                    @if ($order->status_id <> 3)
                                        <tr>
                                            <th class="text-center" style="vertical-align: middle;" scope="row">{{ $index + 1 }}</th>
                                            <td class="text-center" style="vertical-align: middle;"><a href="{{ action('DishesController@show', array('dishes' => $order->dish->id)) }}" title="See Dish"></a></td>
                                            <td class="text-center" style="vertical-align: middle;"><a href="{{ action('UsersController@show', array('users' => $order->dish->user->id)) }}" title="See Profile"></a></td>
                                            <td class="text-center" style="vertical-align: middle;"></td>
                                            <td class="text-center" style="vertical-align: middle;"></td>
                                            <td class="text-center" style="vertical-align: middle;">{{ $order->served_at }}</td>
                                            <td class="text-center" style="vertical-align: middle;">
                                                @if ($order->status_id == 0)
                                                    <span class="orange">Pending</span>
                                                    <a href="{{ action('DishesController@show', array('dishes' => $order->dish, 'isBeingOrdered' => 2, 'order' => $order)) }}"><i class="fa fa-edit" title="Modify Order!"></i></a>
                                                    <a href="{{ action('OrdersController@cancel', array('orders' => $order)) }}"><i class="fa fa-times" title="Cancel Order!"></i></a>
                                                @elseif ($order->status_id == 1)
                                                    <span class="green">Accepted</span>
                                                    @if ($order->reviewed())
                                                        <span><a data-toggle="modal" data-target=".review-modal" onclick="Javascript: document.getElementById('orderId').value = {{ $order->id }};"><i class="fa fa-pencil" title="Review Order!"></i></a></span>
                                                    @else
                                                        <span><a data-toggle="modal" data-target=".review-modal" onclick="Javascript: document.getElementById('orderId').value = {{ $order->id }};"><i class="fa fa-eye" title="See Review!"></i></a></span>
                                                    @endif
                                                @elseif ($order->status_id == 2)
                                                    <span class="red">Rejected</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /LIST OF ORDERS FROM USER -->
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
            <h2>My Reviews</h2>
        @else
            <h2>{{ $user->name }}'s Reviews</h2>
        @endif
        <form class="white-row" method="post" action="shop-cc-pay.html">
            <p>
                @if ($user->isMe())
                    Here's the list of reviews you wrote.
                @else
                    Here's the list of reviews {{ $user->name }} wrote.
                @endif
            </p>
            <h5>Reviews:</h5>

            <!-- LIST OF REVIEWS FROM USER -->
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <table class="table table-hover table-bordered" style="table-layout: fixed">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 5%; vertical-align: middle;">#</th>
                                <th class="text-center" style="width: 15%; vertical-align: middle;">Dish</th>
                                <th class="text-center" style="width: 10%; vertical-align: middle;">Chef's Name</th>
                                <th class="text-center" style="width: 10%; vertical-align: middle;">Title</th>
                                <th class="text-center" style="width: 35%; vertical-align: middle;">Body</th>
                                <th class="text-center" style="width: 10%; vertical-align: middle;">Chef Rating</th>
                                <th class="text-center" style="width: 15%; vertical-align: middle;">Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($user->reviews as $index => $review)
                                <tr>
                                    <th class="text-center" style="vertical-align: middle;" scope="row">{{ $index + 1 }}</th>
                                    <td class="text-center" style="vertical-align: middle;"><a href="{{ action('DishesController@show', array('dishes' => $review->order->dish->id)) }}" title="See Dish">{{ $review->order->dish->name }}</a></td>
                                    <td class="text-center" style="vertical-align: middle;"><a href="{{ action('UsersController@show', array('users' => $review->order->dish->user->id)) }}" title="See Profile">{{ $review->order->dish->user->name }}</a></td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $review->title }}</td>
                                    <td><div class="ellipsis" style="height: 100px;">{{ $review->body }}</div></td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $review->chef_rating }}%</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $review->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /LIST OF REVIEWS FROM USER -->
        </form>
    </div>
</div>