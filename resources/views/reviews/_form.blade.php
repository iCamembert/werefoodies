<!-- modal body -->

<div class="modal-body container-fluid">

    <div class="col-md-7">

        <!-- Title Form Input -->

        <div class="row">
            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <!-- Body Form Input -->

        <div class="row">
            <div class="form-group">
                {!! Form::label('body', 'Body:') !!}
                {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <!-- Chef Rating Form Input -->

        <div class="row">
            <div class="form-group center-block">
                {!! Form::label('chef_rating', 'Chef Rating:') !!}
                {!! Form::input('number', 'chef_rating', null, ['size' => '1', 'class' => 'form-control rating']) !!}
            </div>
        </div>

        <!-- Dish Rating Form Input -->

        <div class="row">
            <div class="form-group center-block">
                {!! Form::label('dish_rating', 'Dish Rating:') !!}
                
                @foreach($user->orders as $order)
                    <div id="order{{ $order->id }}" style="display: none;">
                        @foreach ($order->dishes as $dishToRate)
                            <div class="row">
                                <a href="{{ action('DishesController@show', array('dishes' => $dishToRate, 'isBeingOrdered' => 0)) }}" class="thumbnail">
                                    <img class="img-responsive center-block" src="{{ asset('/userdata/' . $dishToRate->user_id . '/dishes/' . $dishToRate->id . '/picture_sm.jpg') }}" alt="Dish Picture" width="130" height="130" />
                                </a>
                                {!! Form::label('dish_rating', $dishToRate->name . ': ') !!}
                                {!! Form::input('number', 'dish_rating', null, ['size' => '1', 'class' => 'form-control rating', 'data-filled' => 'glyphicon glyphicon-heart', 'data-empty' => 'glyphicon glyphicon-heart-empty']) !!}
                            </div>                                                                          
                        @endforeach
                    </div>
                @endforeach

            </div>
        </div>

        <input id="orderId" name="order_id" type="hidden" value="" />

    </div>

    <div class="col-md-5">


    </div>

</div>

<!-- Add/Edit Order Form Input -->

<div class="modal-footer"><!-- modal footer -->
    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form control']) !!}
</div><!-- /modal footer -->