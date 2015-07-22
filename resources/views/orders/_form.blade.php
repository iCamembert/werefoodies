<!-- modal body -->

<!--<div class="modal-body container-fluid">-->

    <div class="col-md-7">

        <!-- Date Form Input -->

        <div class="row">
            <div class='input-group date center-block' id='datetimepicker'>
                <div class="form-group">
                    {!! Form::label('datetime', 'Date & Time:') !!}
                    {!! Form::text('served_at', null, ['class' => 'form-control']) !!}
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>

        <!-- Type Form Input -->

        <div class="row">
            <div class="form-group center-block">
                {!! Form::label('type', 'Type:') !!}
                <div class="radio radio-primary">
                    <label>
                {!! Form::radio('type_id', 1, ['class' => 'radio radio-success']) !!} Pick up
                    </label>
                </div>
                <div class="radio radio-primary"><label>
                {!! Form::radio('type_id', 2, ['class' => 'radio radio-success']) !!} Delivery
                    </label> </div>
                    <div class="radio radio-primary"><label>
                {!! Form::radio('type_id', 3, ['class' => 'radio radio-success']) !!} At my home
                        </label> </div>
                        <div class="radio radio-primary"><label>
                {!! Form::radio('type_id', 4, ['class' => 'radio radio-success']) !!} At chef's home
                            </label> </div>
            </div>
        </div>

        <!-- Comment Form Input -->

        <!--<div class="row">
            <div class="form-group">
                {!! Form::label('comment', 'Comment:') !!}
                {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
            </div>
        </div>-->

    </div>

    <!--<div class="col-md-5">

        <div class="row">
            <a href="{{ action('UsersController@show', array('users' => $dish->user)) }}"><img class="img-responsive center-block" src="{{ asset('/userdata/' . $dish->user->id . '/profile_picture_sm.jpg') }}" alt="Chef Picture" width="130" height="130" /></a>
        </div>

        <div class="row">
            <h4 class="text-center">{{ $dish->user->name }}</h4>
        </div>

        <div class="divider styleColor white">--><!-- divider -->
            <!--<i class="fa fa-chevron-down"></i>
        </div>

        <div class="row">
            <a href="{{ action('DishesController@show', array('dishes' => $dish, 'isBeingOrdered' => 0)) }}"><img class="img-responsive center-block" src="{{ asset('/userdata/' . $dish->user->id . '/dishes/' . $dish->id . '/picture_sm.jpg') }}" alt="Dish Picture" width="130" height="130" /></a>
            <h4 class="text-center">{{ $dish->name }}</h4>
        </div>

    </div>-->

</div>

<!-- Add/Edit Order Form Input -->

<!--<div class="modal-footer">--><!-- modal footer -->
    <button class="btn btn-default">Back to Cart</button> <!--data-dismiss="modal"-->
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form control']) !!}
<!--</div>--><!-- /modal footer -->