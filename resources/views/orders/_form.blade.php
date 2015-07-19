<!-- modal body -->

<div class="modal-body container-fluid">

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

        <!-- Quantity Form Input -->

        <div class="row">
            <div class="form-group center-block" style="display: flex; align-items: center;">
                <div class="col-md-6">
                    {!! Form::label('quantity', 'Quantity:') !!}
                    {!! Form::number('quantity', null, ['id' => 'quantity', 'class' => 'form-control', 'min' => 1, 'onchange' => 'updateTotalPrice(this.value);']) !!}
                </div>
                <div class="col-md-6">
                    <span>Total Price: <strong id="totalPrice"></strong></span>
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

    </div>

    <div class="col-md-5">

        <div class="row">
            <a href="{{ action('DishesController@show', array('dishes' => $dish, 'isBeingOrdered' => 0)) }}"><img class="img-responsive center-block" src="{{ asset('/userdata/' . $dish->user->id . '/profile_picture_sm.jpg') }}" alt="Chef Picture" width="130" height="130" /></a>
            <span>{{ $dish->user->name }}</span>
        </div>

        <div class="divider styleColor white"><!-- divider -->
            <i class="fa fa-chevron-down"></i>
        </div>

        <div class="row">
            <a href="{{ action('DishesController@show', array('dishes' => $dish, 'isBeingOrdered' => 0)) }}"><img class="img-responsive center-block" src="{{ asset('/userdata/' . $dish->user->id . '/dishes/' . $dish->id . '/picture_sm.jpg') }}" alt="Dish Picture" width="130" height="130" /></a>
            <span>{{ $dish->name }}</span>
        </div>

    </div>

</div>

<!-- Add/Edit Order Form Input -->

<div class="modal-footer"><!-- modal footer -->
    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form control']) !!}
</div><!-- /modal footer -->