@if ($user->isMe())
    <div class="row">
        <div class="col-md-12">
            <h2>{{ trans('strings.profileHungryOrders1') }}</h2>
            <form class="white-row" method="post" action="shop-cc-pay.html">
                <p>
                    {{ trans('strings.profileHungryOrders2') }}
                </p>
                <h5>{{ trans('strings.profileHungryOrders3') }}</h5>

                <!-- LIST OF ORDERS FROM USER -->
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">
                            <table class="table table-hover table-bordered" style="table-layout: fixed">
                                <thead>
                                <tr>
                                    <th class="text-center" style="width: 5%;">#</th>
                                    <th class="text-center" style="width: 35%;">{{ trans('strings.profileHungryOrders4') }}</th>
                                    <th class="text-center" style="width: 15%;">{{ trans('strings.profileHungryOrders5') }}</th>
                                    <th class="text-center" style="width: 10%;">{{ trans('strings.profileHungryOrders6') }}</th>
                                    <th class="text-center" style="width: 15%;">{{ trans('strings.profileHungryOrders7') }}</th>
                                    <th class="text-center" style="width: 20%;">{{ trans('strings.profileHungryOrders8') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($user->orders as $index => $order)
                                    
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
            <h2>{{ trans('strings.profileHungryReviews1') }}</h2>
        @else
            <h2>{{ Lang::get('strings.profileHungryReviews2', ['userName' => $user->name]) }}</h2>
        @endif
        <form class="white-row" method="post" action="shop-cc-pay.html">
            <p>
                @if ($user->isMe())
                    {{ trans('strings.profileHungryReviews3') }}
                @else
                    {{ Lang::get('strings.profileHungryReviews4', ['userName' => $user->name]) }}
                @endif
            </p>
            <h5>{{ trans('strings.profileHungryReviews5') }}</h5>

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
                                    <td class="text-center" style="vertical-align: middle;"><a href="{{ action('DishesController@show', array('dishes' => $review->order->dish->id)) }}" title="See Dish"></a></td>
                                    <td class="text-center" style="vertical-align: middle;"><a href="{{ action('UsersController@show', array('users' => $review->order->dish->user->id)) }}" title="See Profile"></a></td>
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